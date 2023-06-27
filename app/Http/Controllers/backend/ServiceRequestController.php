<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function service_request(){
        return view('backend.pages.service_request.service_requst');
    }
}
