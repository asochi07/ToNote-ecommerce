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
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_product', 'trending_category'));
    }

    public function category()
    {
        $category = category::where('status', '0')->take(12)->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists()){
           $category = Category::where('slug', $slug)->first();
           $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
           return view('frontend.products.index', compact('category', 'products'));
        }
        else{
            return redirect('/')->with('status', "The link is broken!. Try again later");
        }
    }

    public function viewproduct($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists()){
            if(Product::where('slug', $prod_slug)){
                $product = Product::where('slug',  $prod_slug)->first();
                return view('frontend.products.view', compact('product'));
            }
            else{
                return redirect('/')->with('status', "The link is broken!. Try again later");
            }
            }
            else{
                return redirect('/')->with('status', "No search category found");
            }
         
    }
}
