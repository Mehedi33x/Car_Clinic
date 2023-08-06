<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceCenter;
use Illuminate\Http\Request;

class ServiceCenterController extends Controller
{
    public function sercive_center_list(){
        $center=ServiceCenter::paginate(5);
         return view('backend.pages.service_center.center_list',compact('center'));

    }
    public function add_sercive_center(){

        return view('backend.pages.service_center.add_center');
    }
    public function store_sercive_center(Request $request){
        // dd($request->all());
        $center_image='';
        if($image =$request->file('image')){
        $center_image= time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('images/center',$center_image);
        }
        ServiceCenter::create([
            //clm name=>$request->inpt fld
            'image'=>$center_image,
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
        return to_route('center.list')->with('message','Data added successfully!!!');
    }

    public function edit_sercive_center(){
        return view('backend.pages.service_center.edit_center');
    }


    public function delete_sercive_center($id){
        $center=ServiceCenter::findOrFail($id);
            $center->delete();
        return to_route('center.list')->with('message','Data deleted successfully!!!');

    }

}
