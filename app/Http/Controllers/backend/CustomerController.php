<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
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
    // frontend customer profile edit
    public function edit_profile()
    {
        return view('frontend.pages.profile.edit_profile');
    }
    // frontend customer profile update
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
        Toastr::success('Information Update Successfully', 'Success', ['options']);
        return to_route('profile.customer');
    }


    public function booking_list()
    {
    }
}
