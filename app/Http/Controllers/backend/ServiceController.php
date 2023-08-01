<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'cost'=>'required',
            'status'=>'required',

        ]);

        $service_image='';
        if($request->hasFile('image')){
            $image=$request->file('image');
            $service_image=date('Ymdhsi').'.'.$image->getClientOriginalExtension();
            $image->storeAs('/service',$service_image);
        }

        Service::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'cost'=>$request->cost,
            'status'=>$request->status,
            'image'=>$service_image,

        ]);
        return to_route('service.list')->with('message','Data added successfully!!!');
    }

    public function edit_service($id){
        $service = Service::findOrFail($id);
        // dd($service);
        return view('backend.pages.service.edit_service',compact('service'));
    }

    public function update_service(Request $request ,$id){
        $service=Service::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'cost'=>'required',
            'status'=>'required',
        ]);
                // dd($request->all());

                $service_image=$service->image;
                if($image=$request->file('image')){
                    if(file_exists(public_path('uploads/service/'.$service_image))){
                        // Log::useFiles('path', 'level');
                        // File::delete($oldimage);

                        File::delete(public_path('uploads/service/'.$service_image));
                    }
                    $service_image= time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                    $image->move('uploads/service/',$service_image);
                }
                $service->update([
                    'name'=>$request->name,
                    'description'=>$request->description,
                    'cost'=>$request->cost,
                    'status'=>$request->status,
                    "image"=>$service_image,
                ]);

                return to_route('service.list')->with('message','Data updated successfully!!!');



    }

    public function detele_service($id){
        $service=Service::findOrFail($id);
        $service->delete();
        return to_route('service.list')->with('message','Data deleted successfully!!!');
    }

}
