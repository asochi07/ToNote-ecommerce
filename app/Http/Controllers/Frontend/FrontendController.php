<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Category as Category;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_product = Product::where('trending', '1')->take(15)->get();
        return view('frontend.index', compact('featured_product'));
    }
}
