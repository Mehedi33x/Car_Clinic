<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function service_page(){
        $services=Service::latest()->take(100)->get();
        return view('frontend.pages.service.service',compact('services'));

    }
}
