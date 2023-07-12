<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function service_page(){
        return view('frontend.pages.service.service');

    }
}
