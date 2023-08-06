<?php

namespace App\Http\Controllers\frontend;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyEmailNotification;

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

        $customer = Customer::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        $verificationCode = Str::random(120);

        $customer->notify(new VerifyEmailNotification($customer,$verificationCode));
        return to_route('homepage.webpage');
    }

    public function do_login(Request $request){
        // dd($request->all());

        $credentials=$request->except('_token');
        // dd($credentials);

        if( auth()->guard('customers')->attempt($credentials)){
            // dd(auth()->guard('customers')->user());
            return to_route('homepage.webpage')->with('message','Login Succesfully');
        }
        else{
            return to_route('login.webpage')->with('message','Invalid Information');
        }

    }

    public function logout(){
        Auth::guard('customers')->logout();
        return to_route('homepage.webpage');
    }


}
