<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        return view('backend.pages.car_category.car_category');
    }
    public function add_category(){
    return view('backend.pages.car_category.add_category');

}

    public function store_category(Request $request){
        //  dd($request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        return to_route('category');

}


}
