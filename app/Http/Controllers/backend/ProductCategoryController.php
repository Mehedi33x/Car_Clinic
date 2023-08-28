<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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

    public function view_cat($id){
        $category=ProductCategory::find($id);
        return view('backend.pages.product_category.view_category',compact('category'));
    }
    public function edit_cat($id){
        $cat=ProductCategory::find($id);
        return view('backend.pages.product_category.edit_cat',compact('cat'));
    }
    public function store_cat(Request $request,$id){
        // dd($request->all());

        $cat=ProductCategory::find($id);
        $cat_image = $cat->image;
        // dd(public_path('images/mechanics/'.$mechanic_image));
        if ($image = $request->file('image')) {
            if (file_exists(public_path('uploads/productCategory/' . $cat_image))) {
                // Log::useFiles('path', 'level');
                // File::delete($oldimage);

                File::delete(public_path('uploads/productCategory/' . $cat_image));
            }
            $cat_image = time() . '-' . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/productCategory/', $cat_image);
        }
        $cat->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'active',
            'image' => $cat_image,

        ]);
        return to_route('category.product.view');
    }
    public function delete_cat($id){
        $cat=ProductCategory::find($id);
        $cat->delete();

        return to_route('category.product.view');
    }






    // frontend
    public function category_wise($id)
    {
        $products = Product::where('category_id', $id)->with('catData')->get();
        // dd($products);
        return view('frontend.pages.product.catWiseProduct', compact('products'));
    }
}
