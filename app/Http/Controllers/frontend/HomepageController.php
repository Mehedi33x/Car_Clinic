<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(){
        $mechanics=Mechanic::latest()->take(8)->get();
        return view('frontend.pages.homepage.homepage',compact('mechanics'));
    }
}
