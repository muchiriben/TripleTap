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

            Gallery::create([
                'image' => $uploadedFileUrl,
            ]);
        }

        return redirect()->route('admin.gallery.create')->with('success', 'New Image(s) added');
    }
}
