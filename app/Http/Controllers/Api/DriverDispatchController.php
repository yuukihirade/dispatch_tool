<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\DispatchRequest;
use Carbon\Carbon;

class DriverDispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $drivers = Driver::all()->sortByDesc('updated_at');
        $today = Carbon::today();
        $dispatch_requests = DispatchRequest::with(['customer', 'location'])->whereDate('start_datetime', $today)->get();
        $dispatch_request_by_drivers = [];
        
        foreach ($dispatch_requests as $dispatch_request) {
            $dispatch_request_by_drivers[$dispatch_request->driver_id][] = $dispatch_request;
        }
        
        return [
            'drivers' => $drivers,
            'dispatch_requests' => $dispatch_request_by_drivers
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
