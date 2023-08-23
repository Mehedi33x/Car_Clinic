<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use App\Models\User;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage(){
        $mechanics=User::where('role','mechanic')->latest()->take(8)->get();
        return view('frontend.pages.homepage.homepage',compact('mechanics'));
    }
}
