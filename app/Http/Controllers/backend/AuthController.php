<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function admin_login(){
        return view('backend.pages.auth.login');
    }

    public function admin_do_login(Request $request){

        // dd($request->all());
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|numeric',

        ]);
        // $credential=$request->only('email','password');
        $credential=$request->except('_token');
        if(Auth::attempt($credential)){
            return to_route('dashboard');
        }
        return to_route('admin.login');
    }
    public function admin_logout(){
        Auth::logout();
        return to_route('admin.login');
    }
}
