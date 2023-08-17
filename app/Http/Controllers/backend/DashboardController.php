<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Mechanic;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $bookings=Booking::count();
        $customers=Customer::count();
        $services=Service::count();
        $mechanics=Mechanic::count();
        // dd($bookings);
        return view('backend.pages.dashboard.dashboard',compact('bookings','customers','services','mechanics'));
    }
}
