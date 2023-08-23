<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;

class AboutController extends Controller
{
    public function about_page()
    {
        $mechanics = User::where('role', 'mechanic')->latest()->take(8)->get();
        return view('frontend.pages.about.about', compact('mechanics'));
    }
}
