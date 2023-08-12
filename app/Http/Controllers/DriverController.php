<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Driver;

use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    //
    public function add()
    {
        abort_if(Auth::user()->department_id == 2 |Auth::user()->department_id == 4, 403, '権限がありません。');
        return view('driver.add');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Driver::$rules);
        // dd($request);
        $driver = new Driver;
        $driver->name = $request->name;
        
        unset($driver['_token']);
        // dd($driver);
        $driver->save();
        
        return redirect('/');
    }
    
}
