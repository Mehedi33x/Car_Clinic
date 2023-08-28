<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function view_category()
    {
        $category = ProductCategory::paginate(5)->all();
        return view('backend.pages.product_category.category_view', compact('category'));
    }
    public function add_category()
    {
        return view('backend.pages.product_category.add_category');
    }
    public function store_category(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category_image = '';
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $category_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/productCategory', $category_image);
        }

        ProductCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active',
            'image' => $category_image,
        ]);

        return to_route('category.product.view')->with('message', 'Data added successfully!!!');
    }



    // frontend
    public function category_wise($id)
    {
        $products = Product::where('category_id', $id)->with('catData')->get();
        // dd($products);
        return view('frontend.pages.product.catWiseProduct', compact('products'));
    }
}
