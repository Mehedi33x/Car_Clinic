<?php

namespace App\Http\Controllers\frontend;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyEmailNotification;
use Brian2694\Toastr\Facades\Toastr;

class AuthwebController extends Controller
{
    public function login()
    {
        return view('frontend.pages.auth.login');
    }
    public function signup()
    {
        return view('frontend.pages.auth.signup');
    }
    public function signup_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($request->all());

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $verificationCode = Str::random(120);

        // $customer->notify(new VerifyEmailNotification($customer, $verificationCode));
        Toastr::success('Registration Successful', 'Success', ['options']);
        return to_route('homepage.webpage');
    }

    public function do_login(Request $request)
    {
        // dd($request->all());

        $credentials = $request->except('_token');
        // dd($credentials);

        if (auth()->guard('customers')->attempt($credentials)) {
            // dd(auth()->guard('customers')->user());
            Toastr::success('Login Successful', 'Success', ['options']);
            return to_route('homepage.webpage');
        } else {
            Toastr::error('Invalid User Informations', 'Error', ['options']);
            return to_route('login.webpage');
        }
    }

    public function logout()
    {
        Auth::guard('customers')->logout();
        Toastr::success('Logout Successful', 'Success', ['options']);
        return to_route('homepage.webpage');
    }
}
