<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

use App\Models\Customer;

use App\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Auth;


class LocationController extends Controller
{
    //
    public function add()
    {
        abort_if(Auth::user()->department_id == 4, 403, '権限がありません。');
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
        
        return redirect()->action([CustomerController::class, 'index']);
    }
    
    public function index(Request $request)
    {
        
    }
    
    public function edit(Request $request)
    {
        abort_if(Auth::user()->department_id == 4, 403, '権限がありません。');
        
        $location = Location::find($request->id);
        $customers = Customer::all();
        
        if (empty($location)){
            abort(404);
        }
        
        
        return view('customer.location.edit', ['location' => $location,
                                               'customers' => $customers,
                                                ]);
    }
    
    public function update(Request $request)
    {
        
        $this->validate($request, Location::$rules);
        
        // dd($request);
        
        $location = Location::find($request->id);
        
        // dd($location);
        
        $form = $request->all();
        
        // dd($form);
        
        if($request->remove == 'true'){
            $form['map_path'] = null;
        }
        elseif($request->file('map')){
            $map_paths = array();
            foreach ($request->file('map') as $map){
                $path = $map->store('public/map');
                array_push($map_paths, basename($path));
            }
            array_push($map_paths, $location->map_path);
            // dd($map_paths);
            $location->map_path = implode(',', $map_paths);
        }
        
        // dd($location->map_path);
        
        unset($form['map']);
        unset($form['remove']);
        unset($form['_token']);
        
        // dd($form);
        
        $location->fill($form)->save();
        return redirect('customer/index');
    }
    
    public function delete(Request $request)
    {
        abort_if(Auth::user()->department_id == 4, 403, '権限がありません。');
        // dd($request->id);
        $location = Location::find($request->id);
        // dd($location);
        $location->delete();
        
        return redirect('customer/index');
    }
}
