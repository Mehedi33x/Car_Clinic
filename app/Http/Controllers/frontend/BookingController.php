<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Http\Controllers\Controller;
use App\Notifications\BookingMail;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Support\Str;

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
        $booking = Booking::find($id);
        $mechanic = User::where('role', 'mechanic')->get();
        // dd($mechanic);
        // return view('backend.pages.service_request.edit_request');
        return view('backend.pages.service_request.edit_service_request', compact('booking', 'mechanic'));
    }
    public function update_request(Request $request, $id)
    {
        // dd($request->all());
        $booking = Booking::findOrFail($id);
        // dd($booking);

        $booking->update([
            'assign' => $request->assign_to,
            'status' => $request->status,
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'address' => $request->address,
            'car_type' => $request->car_type,
            'car_brand' => $request->car_brand,
            'reg_num' => $request->reg_num,
            // 'service' => $request->service,
            'cost' => $request->cost,
            'special_request' => $request->special_request,
            // 'date' => $request->date,
        ]);

        return to_route('service.request')->with('message','Data updated successfully!!!');
    }

    public function delete_request($id){
        $booking=Booking::findOrFail($id);
        $booking->delete();

        return to_route('service.request')->with('message','Data deleted successfully!!!');

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
            'booking_code'=>Str::random(10),
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
        // dd($$booking);
        // for sending mail
        $booking->notify(new BookingMail($booking));
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


    //not working...should be delete by booking id

    // public function delete_booking(){
    //     $booking=Booking::findOrFail(auth('customers')->user()->id);
    //     $booking->delete();
    // }

}
