<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $images = Gallery::inRandomOrder()->get();
        return view('guest.gallery')->with('images', $images);
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        foreach ($request->file('images') as $image) {

            // Upload an Image File to Cloudinary 
            $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), ['folder' => 'gallery'])->getSecurePath();
            $imageId = Cloudinary::getPublicId();

            Gallery::create([
                'image' => $uploadedFileUrl,
                'imageId' => $imageId,
            ]);
        }

        return redirect()->route('admin.gallery.create')->with('success', 'New Image(s) added');
    }

    public function view()
    {
        $images = Gallery::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.gallery.view')->with('images', $images);
    }

    public function destroy($image_id)
    {
        $image = Gallery::findorfail($image_id);
        if ($image->image != NULL) {
            //delete previous
            Cloudinary::destroy($image->imageId);
        }

        $image->delete();
        return redirect()->route('admin.gallery')->with('error', 'Image Deleted!!');
    }
}
