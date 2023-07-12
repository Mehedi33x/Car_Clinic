<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(){
        return view('frontend.pages.booking.booking');
    }
    public function booking_store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'contact'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'car_type'=>'required',
            'car_brand'=>'required',
            'reg_num'=>'required',
            'service'=>'required',
            'date'=>'required',
        ]);

        Booking::create([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
            'car_type'=>$request->car_type,
            'car_brand'=>$request->car_brand,
            'reg_num'=>$request->reg_num,
            'service'=>$request->service,
            'date'=>$request->date,

        ]);

    }
}
