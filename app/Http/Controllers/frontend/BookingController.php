<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //Backend
    public function service_request(){
        $bookings=Booking::paginate(5);
        return view('backend.pages.service_request.service_requst',compact('bookings'));
    }
    //frontend
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
            'car_brand'=>'required',
            'car_type'=>'required',
            'reg_num'=>'required',
            'service'=>'required',
            'date'=>'required',
        ]);
                // dd($request->all());


        Booking::create([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'address'=>$request->address,
            'car_type'=>$request->car_type,
            'car_brand'=>$request->car_brand,
            'reg_num'=>$request->reg_num,
            'service'=>$request->service,
            'special_request'=>$request->special_request,
            'date'=>$request->date,

        ]);
        return to_route('booking.webpage');

    }
}
