<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use File;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function mechanic_list(){
        $mechanics=Mechanic::paginate(5);
        return view('backend.pages.mechanic.mechanic_list',compact('mechanics'));
    }

    public function add_mechanic(){
        return view('backend.pages.mechanic.add_mechanic');
    }



    public function store_mechanic(Request $request){
        //dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'status'=>'required',

        ]);
        $mechanic_image='';
        if($image =$request->file('image')){
        $mechanic_image= time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('images/mechanics',$mechanic_image);
        }


    Mechanic::create([
        'image'=>$mechanic_image,
        'name'=>$request->name,
        'email'=>$request->email,
        'contact'=>$request->contact,
        'address'=>$request->address,
        'status'=>$request->status
    ]);
    return to_route('mechanic.list');
    }

    public function edit_mechanic($id){
        $mechanic=Mechanic::findOrFail($id);
        return view('backend.pages.mechanic.edit_mechanic',compact('mechanic'));
    }
    public function update_mechanic(Request $request,$id){
        $mechanic=Mechanic::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'address'=>'required'
        ]);

        $mechanic_image='';
        $oldimage ='images/mechanics'.$mechanic->image;

        if($image=$request->file('image')){
            if(file_exists($oldimage)){
                // Log::useFiles('path', 'level');
                // File::delete($oldimage);
                File::delete($oldimage);
            }
            $mechanic_image= time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('/images/mechanics/',$mechanic_image);
        }
        else{
            $mechanic_image=$mechanic->image;
        }

        Mechanic::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'status'=>$request->status
        ]);
        return to_route('mechanic.list');
    }
    // public function delete($id){


    // }






}
