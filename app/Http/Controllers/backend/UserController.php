<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list (){
        return view('backend.pages.user.user_list');
    }

    public function user_add(){
        return view('backend.pages.user.user_add');
    }
}
