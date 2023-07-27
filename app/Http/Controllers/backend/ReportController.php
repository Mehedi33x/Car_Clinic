<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(){
        return view('backend.pages.reports.booking_report');
    }

    public function report_show(Request $request){

        // dd($request->all());

        $request->validate([
            'from_date'=>'required|date',
            'to_date'=>'required|date|after:from_date'
        ]);

        $from=$request->from_date;
        $to=$request->to_date;

        $bookings=Booking::whereBetween('created_at',[$from,$to])->get();
        // dd($bookings);

        return view('backend.pages.reports.booking_report',compact('bookings'));


    }
}
