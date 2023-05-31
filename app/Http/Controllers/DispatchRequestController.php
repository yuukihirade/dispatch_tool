<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Location;
use App\Models\SizeCategory;
use App\Models\Ability;
use App\Models\User;
use App\Models\DispatchRequest;
// use Illuminate\Support\Facades\Auth;

class DispatchRequestController extends Controller
{
    //
    public function add(Request $request)
    {
        // if ($request->search != '検索')
        // {
        //     $customers = Customer::all();
        // } else{
        //     if ($request->cond_customer == ''){
        //         $customers = Customer::all();
        //     } else{
        //         $keyword = '%' . addcslashes($request->cond_customer, '%_\\') . '%';
        //         $customers = Customer::where('name', 'like', $keyword)->get();
        //     }
        // }
        
        // $customer_name = $request->customer_name;
        $customers = Customer::all();
        $locations = Location::all();
        $size_categories = SizeCategory::all();
        $abilities = Ability::all();
        $users = User::all();
        
        // dd(Auth::user()->department_id);
        
        return view('dispatch.request_add',['customers' => $customers,
                                            'locations' => $locations,
                                            'size_categories' => $size_categories,
                                            'abilities' => $abilities,
                                            'users' => $users,
                                            ]);
    }
    
    public function create(Request $request)
    {
        
        $this->validate($request, DispatchRequest::$rules);
        
        $dispatch_request = new DispatchRequest;
        $form = $request->all();
        // dd($form);
        
        if (isset($form['image'])) {
            $image_paths = array();
            foreach ($request->file('image') as $image){
                $path = $image->store('public/image');
                array_push($image_paths, basename($path));
            }
            // dd($image_paths);
            $dispatch_request->image_path = implode(',', $image_paths);
        } else {
            $dispatch_request->image_path = null;
        }
        
        // dd($dispatch_request->image_path);
        unset($form['image']);
        unset($form['_token']);
        
        $dispatch_request->approval_status = $request->has('approval_status');
        // dd($dispatch_request->approval_status);
        
        $dispatch_request->car_id = null;
        // dd($form);
        $dispatch_request->fill($form)->save();
        
        if($request->submit == '申請する')
        {
            return redirect('/home');
        }
        elseif($request->accept == "申請 & 承認")
        {
            if($request->approval_status == true)
            {
                return redirect('dispatch/request/edit');
            } 
            elseif($request->approval_status == false)
            {
                return redirect('/home');
            }
        }
    }
    
    public function edit(Request $request)
    {
        return view('dispatch.request_edit');
    }
}
