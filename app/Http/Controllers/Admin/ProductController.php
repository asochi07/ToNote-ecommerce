<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Category as Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    public function insert(Request $request)
    {
        $product = new Product;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True ? '1' : '0';
        $product->trending = $request->input('trending') == True ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->save();
        return redirect('/products')->with('status', "product Added Successful");
    }

    public function edit($id)
    {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit')->with(['product' => $product, 'category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image = $filename;
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == True ? '1' : '0';
        $product->trending = $request->input('trending') == True ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->update();
        return redirect('/products')->with('status', "product Updated Successful");
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->image){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
            $product->delete();
            return redirect('/products')->with('status', "Product Deleted Successfully");
    }

}