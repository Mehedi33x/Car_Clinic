<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function do_login(Request $request){
        // dd($request->all());

        $credentials=$request->except('_token');
        // dd($credentials);

        if( auth()->guard('customers')->attempt($credentials)){
            // dd(auth()->guard('customers')->user());
            return to_route('homepage.webpage');
        }
        else{
            return to_route('login.webpage');
        }

    }

    public function logout(){
        Auth::guard('customers')->logout();
        return to_route('homepage.webpage');
    }


}
