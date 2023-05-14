<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

use App\Models\Customer;

class LocationController extends Controller
{
    //
    public function add()
    {
        // dd('add動いた');
        $customers = Customer::all();
        return view('customer.location.create', ['customers' => $customers]);
    }
    
    public function create(Request $request)
    {
        // dd($request);
        $this->validate($request, Location::$rules);
        
        $location = new Location;
        $form = $request->all();
        // dd($request);
        if(isset($form['map'])) {
            // dd($request->file('map'));
            $map_paths = array();
            foreach ($request->file('map') as $map){
                $path = $map->store('public/map');
                array_push($map_paths, basename($path));
            }
            $location->map_path = implode(",", $map_paths);
            
        } else {
            $location->map_path = null;
        }
        // dd($location);
        unset($form['map']);
        
        unset($form['_token']);
        
        $location->fill($form)->save();
        
        return redirect('customer/location/add');
    }
}
