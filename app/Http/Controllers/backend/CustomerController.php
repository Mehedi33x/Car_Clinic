<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_list()
    {
        $customer = Customer::paginate(5);
        return view('backend.pages.customer.customer', compact('customer'));
    }

    public function customer_profile()
    {
        return view('frontend.pages.profile.customer_profile');
    }

    public function edit_profile()
    {
        return view('frontend.pages.profile.edit_profile');
    }
    public function update_profile(Request $request)
    {
        // dd($request->all());
        $user = Customer::find(auth('customers')->user()->id);
        // dd($user);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return to_route('profile.customer');
    }


    public function booking_list(){
        
    }
}
