<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class FindSubCategoriesController extends Controller
{
    public function findsubcategories($id)
    {
        $subcategories = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategories);
    }
}
