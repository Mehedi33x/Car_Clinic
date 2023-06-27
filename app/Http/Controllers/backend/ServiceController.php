<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class ServiceController extends Controller
{
    public function service(){
        $services=Service::paginate(5);
    return view('backend.pages.service.service_list',compact("services"));
    }
    public function add_service(){
        return view('backend.pages.service.add_servive');
    }
    public Function store_service(Request $request){
        //  dd($request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'cost'=>'required',
            'status'=>'required',

        ]);

        $service_image='';
        if($image=$request->file('image')){
        $service_image= time().'-'.uniqid().'.'.$image->getClientOriginalExtention();
        $image->move('/images/service',$service_image);


        }

        Service::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'cost'=>$request->cost,
            'status'=>$request->status,
            'image'=>$service_image,
        ]);
        return to_route('service.list');
    }

    public function detele_service($id){
        $service=Service::findOrFail($id);
        $service->delete();
        return to_route('service.list');

    }

}
