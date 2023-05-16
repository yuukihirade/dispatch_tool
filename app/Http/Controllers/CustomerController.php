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
    
    public function index(Request $request)
    {
        if ($request->search != '検索')
        {
            // dd('if');
            $customers = Customer::all();
        } else {
            if ($request->cond_name == '')
            {
                // dd($request);
                $customers = Customer::all();
            } else {
                // dd($request);
                // dd($request->cond_name);
                //\DB::enableQueryLog();
                $cond_param = '%' . addcslashes($request->cond_name, '%_\\') . '%';
                // dd($cond_param);
                $customers = Customer::where('name', 'like', $cond_param)->get();
                //dd(\DB::getQueryLog());
            }
        }
        
        return view('customer.index', ['customers' => $customers]);
    }
}
