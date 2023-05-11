<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

use App\Models\Location;

class CustomerController extends Controller
{
    //
    public function add()
    {
        return view('customer.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Customer::$rules);
        
        $customer = new Customer;
        
        $customer->name = $request->name;
        
        // dd($customer);
        
        $customer->save();
        
        return redirect('customer/index');
    }
    
    public function index()
    {
        return view('customer.index');
    }
}
