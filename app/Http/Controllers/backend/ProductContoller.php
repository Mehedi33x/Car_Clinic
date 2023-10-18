<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductContoller extends Controller
{
    public function product_list()
    {
        $products = Product::paginate(5);
        // dd($products->all());
        return view('backend.pages.product.product_list', compact('products'));
    }
    public function product_add()
    {
        $category = ProductCategory::get();
        return view('backend.pages.product.add_product', compact('category'));
    }
    public function product_store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'description'=>'required',
        ]);


        $product_image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $product_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/product', $product_image);
        }
        // dd($product_image);

        Product::create([
            'product_code' => Str::random(10),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'status' => 'active',
            'image' => $product_image,
        ]);

        return to_route('product.list')->with('message', 'Data added successfully !!!');
    }

    public function product_view($id)
    {
        $products = Product::find($id);
        return view('backend.pages.product.view_product', compact('products'));
    }
    public function product_delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return to_route('product.list')->with('message', 'Data added successfully !!!');
    }
    public function edit_product($id)
    {
        $product = Product::find($id);
        return view('backend.pages.product.edit_product', compact('product'));
    }
    public function store_update(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        $product_image = $product->image;
        // dd(public_path('images/mechanics/'.$mechanic_image));
        if ($image = $request->file('image')) {
            if (file_exists(public_path('uploads/product/' . $product_image))) {
                // Log::useFiles('path', 'level');
                // File::delete($oldimage);

                File::delete(public_path('uploads/product/' . $product_image));
            }
            $product_image = time() . '-' . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/product/', $product_image);
        }

        $product->update([
            'product_code' => Str::random(10),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $product_image,
        ]);
        return to_route('product.list');
    }







    //search
    public function search(Request $request)
    {
        // dd($request->all());
        $searchKey = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $searchKey . '%')->get();;

        // dd($products);
        return view('frontend.pages.product.search_products', compact('products'));
    }


    // frontend

    public function all_product()
    {
        $products = Product::with('catData')->get();
        return view('frontend.pages.product.product', compact('products'));
    }
    public function product_details($id)
    {
        $products = Product::find($id);
        // dd($products);
        return view('frontend.pages.product.product_details', compact('products'));
    }
}
