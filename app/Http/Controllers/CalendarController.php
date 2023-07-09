<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Location;
use App\Models\SizeCategory;
use App\Models\Ability;
use App\Models\User;
use App\Models\DispatchRequest;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CalendarController extends Controller
{
    //
    public function index(Request $request)
    {
        $dispatch_requests = DispatchRequest::all();
        $js_dispatch = [];
        
        foreach($dispatch_requests as $r){
            if ($r->approval_status == true){
                $title = $r->customer->name . '(' . $r->location->name . ')';
                $array = array('title' => $title, 'start' => $r->start_datetime);
                array_push($js_dispatch, $array);
            }
        }
        
        return view('calendar.dispatch_calendar', ['js_dispatch' => $js_dispatch]);
    }
}
