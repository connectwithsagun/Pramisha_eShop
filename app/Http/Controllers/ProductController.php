<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $viewSingleProduct = Product::findOrFail($id);
     return view('single',['viewSingleProduct' => $viewSingleProduct]);


    }
}
