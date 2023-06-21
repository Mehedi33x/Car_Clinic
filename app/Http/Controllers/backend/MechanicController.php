<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function mechanic_list(){
        return view('backend.pages.mechanic.mechanic_list');
    }

    public function add_mechanic(){
        return view('backend.pages.mechanic.add_mechanic');
    }

    public function store_mechanic(Request $request){
        //dd($request->all());
    Mechanic::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'contact'=>$request->contact,
        'address'=>$request->address,
        'status'=>$request->status
    ]);
    return to_route('mechanic.list');
    }
}
