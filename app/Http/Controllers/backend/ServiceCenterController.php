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
        ServiceCenter::create([
            //clm name=>$request->inpt fld
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);
        return to_route('center.list');
    }
}
