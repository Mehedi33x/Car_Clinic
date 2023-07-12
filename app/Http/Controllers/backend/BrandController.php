<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand_list(){
        $brand=Brand::paginate(5);
        return view('backend.pages.brand.brand',compact('brand'));
    }
    public function add_brand(){
        return view('backend.pages.brand.brand_add');
    }
    public function store_brand(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $brand_image='';
        if($image=$request->hasFile('image'))
        {
            $image=$request->file('image');
            $brand_image=date('Ymdhsi').'.'.$image->getClientOriginalExtension();
            $image->storeAs('/brand',$brand_image);
        }

        Brand::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$brand_image,

        ]);
        return to_route('brand.list');
    }

}
