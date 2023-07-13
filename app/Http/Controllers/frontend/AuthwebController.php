<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AuthwebController extends Controller
{
    public function login(){
            return view('frontend.pages.auth.login');
        }
    public function signup(){
            return view('frontend.pages.auth.signup');
        }
    public function signup_store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        // dd($request->all());

        Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        return to_route('homepage.webpage');
    }

}
