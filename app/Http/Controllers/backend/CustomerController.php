<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_list(){
        return view('backend.pages.customer.customer');
    }
    
}
