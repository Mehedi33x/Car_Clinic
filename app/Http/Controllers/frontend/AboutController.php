<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about_page(){
        $mechanics=Mechanic::latest()->take(8)->get();
        return view('frontend.pages.about.about',compact('mechanics'));
    }
}
