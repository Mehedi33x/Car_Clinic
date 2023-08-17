<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Mechanic;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Notifications\VerifyEmailNotification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //Backend
    public function service_request()
    {
        $bookings = Booking::paginate(5);
        // $mechanic = Mechanic::all();
        // dd($bookings);
        return view('backend.pages.service_request.service_requst', compact(['bookings']));
    }

    public function view_request($id)
    {
        $booking = Booking::find($id);
        return view('backend.pages.service_request.view_request', compact('booking'));
    }
    public function edit_request($id)
    {
        $booking=Booking::find($id);
        // dd($booking);
        return view('backend.pages.service_request.edit_service_request',compact('booking'));
    }




    //frontend
    public function booking()
    {
        return view('frontend.pages.booking.booking');
    }
    public function booking_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'car_brand' => 'required',
            'car_type' => 'required',
            'reg_num' => 'required',
            'service' => 'required',
            'service_charges' => 'required',
            'date' => 'required|date|after_or_equal:today',
        ]);
        //  dd($request->all());


        $booking = Booking::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'address' => $request->address,
            'car_type' => $request->car_type,
            'car_brand' => $request->car_brand,
            'reg_num' => $request->reg_num,
            'service' => $request->service,
            'cost' => $request->service_charges,
            'special_request' => $request->special_request,
            'date' => $request->date,

        ]);
        // for sending mail
        // $booking->notify(new VerifyEmailNotification($booking));
        Toastr::success('Service Booked Successfuly', 'Success', ['options']);
        return to_route('booking.webpage');
    }
    public function booking_charge(Request $request)
    {
        $totalCost = 0;
        if (isset($request->selectedOptions)) {
            $services = Service::whereIn("name", $request->selectedOptions)->pluck("cost")->toArray();
            $totalCost = array_sum($services);
        }
        return $totalCost;
    }
}
