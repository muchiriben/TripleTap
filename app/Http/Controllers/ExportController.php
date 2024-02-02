<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportProducts;
use App\Models\Product;

class ExportController extends Controller
{
    public function exportProducts(Request $request)
    {
        return Excel::download(new ExportProducts, 'accessories.xlsx');
    }
}
