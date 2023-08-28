<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductContoller extends Controller
{
    public function product_list()
    {
        $products = Product::get();
        $category = ProductCategory::with('productCategory')->get();
        return view('backend.pages.product.product_list', compact('products', 'category'));
    }
    public function product_add()
    {
        $category = ProductCategory::get();
        return view('backend.pages.product.add_product', compact('category'));
    }
    public function product_store(Request $request)
    {
        // dd($request->all());
        $request->validate([]);


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

    public function product_view()
    {
        return view('backend.pages.product.view_product');
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
