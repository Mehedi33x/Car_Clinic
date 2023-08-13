<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function brand_list(){
        $brand=Brand::paginate(5);
        return view('backend.pages.brand.brand',compact('brand'));
    }
    public function view_brand($id){
        $brand=Brand::findOrFail($id);
        return view('backend.pages.brand.brand_view',compact('brand'));
    }
    public function add_brand(){
        return view('backend.pages.brand.brand_add');
    }

    //create
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


    // edit
    public function edit_brand($id){
        $brand=Brand::findOrFail($id);
        return view('backend.pages.brand.brand_edit',compact('brand'));
    }

    public function update_brand(Request $request,$id){
        // dd($request->all());
        $brand=Brand::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $brand_image=$brand->iamge;
        if($image=$request->file('image')){
            if(file_exists(public_path('uploads/brand/'.$brand_image))){
                File::delete(public_path('uploads/brand/'.$brand_image));
            }
            $brand_image= date('Ymdhsi').'.'.$image->getClientOriginalExtension();
            $image->move('uploads/brand/',$brand_image);
        }

        $brand->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'image'=>$brand_image
        ]);

        return to_route('brand.list')->with('message','Data updated successfully!!!');
    }

    // delete
    public function brand_delete($id){
        $brand=Brand::findOrFail($id);
        $oldimage ='uploads/brand'.$brand->image;
    if(file_exists($oldimage))
    {
        File::delete($oldimage);
    }
    $brand->delete();
    return to_route('brand.list')->with('message','Data deleted successfully!!!');
    }










}
