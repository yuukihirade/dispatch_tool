<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index(Request $request)
    {
        // $date = $request->
        return view('calendar.dispatch_calendar');
    }
}