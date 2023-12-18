<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class FindSubCategoriesController extends Controller
{
    public function findsubcategories($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();
        return response()->json($subcategories);
    }
}
