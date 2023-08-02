<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_list(){
        $customer=Customer::paginate(5);
        return view('backend.pages.customer.customer',compact('customer'));
    }

}
