<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::paginate(5);
        return view('backend.pages.car_category.car_category', compact('category'));
    }

    public function view_type($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.pages.car_category.view_category', compact('category'));
    }

    public function add_category()
    {
        return view('backend.pages.car_category.add_category')->with('message','Data added successfully !!!');
    }

    public function store_category(Request $request)
    {
        //  dd($request->all());

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        //  dd($request->all());


        $category_image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $category_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/category', $category_image);
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $category_image,
        ]);
        return to_route('category');
    }

    public function edit_category($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.pages.car_category.edit_category', compact('category'));
    }

    public function update_category(Request $request, $id)
    {

        // dd($request->all());
        $category = Category::findOrFail($id);
        // dd($category);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $car_image = $category->image;
        // dd(public_path('images/mechanics/'.$mechanic_image));
        if ($image = $request->file('image')) {
            if (file_exists(public_path('uploads/mechanics/' . $car_image))) {
                // Log::useFiles('path', 'level');
                // File::delete($oldimage);

                File::delete(public_path('uploads/mechanics/' . $car_image));
            }
            $car_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/category/', $car_image);
        }
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image'=>$car_image,
        ]);

        return to_route('category')->with('message','Data updated successfully !!!');
    }

    public function delete_category($id)
    {

        $category = Category::findOrFail($id);

        $category->delete();

        return to_route('category')->with('message','Data deleted successfully !!!');
    }
}
