<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list (){
        $users=User::paginate(5);
        return view('backend.pages.user.user_list',compact('users'));
        return view('');
        
    }

    public function user_add(){
        return view('backend.pages.user.user_add');
    }
    public function store (Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'contact'=>'required',
            'address'=>'required',

        ]);
        User::create([
            // clm name ---------- input field name
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'contact'=>$request->contact,
            'address'=>$request->address,
        ]);
        return to_route('user.list');
    }
}
