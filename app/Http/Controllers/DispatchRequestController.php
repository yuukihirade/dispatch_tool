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
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;

class DispatchRequestController extends Controller
{
    //
    public function add(Request $request)
    {
        abort_if(Auth::user()->department_id == 4, 403, '権限がありません。');
        
        $customers = Customer::all();
        $locations = Location::all();
        $size_categories = SizeCategory::all();
        $abilities = Ability::all();
        $users = User::all();
        
        
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
        
        $dispatch_request->approval_status = null;
        // dd($dispatch_request->approval_status);
        
        $dispatch_request->car_id = null;
        // dd($form);
        $dispatch_request->driver = null;
        
        // dd($request);
        $dispatch_request->fill($form)->save();
        
        if($request->submit == '申請する')
        {
            
            return redirect('/home');
        }
        elseif($request->accept == "申請 & 承認")
        {
            return redirect()->route('dispatch.request.edit', ['dispatch_request_id' => $dispatch_request]);
            
        }
    }
    
    public function index(Request $request)
    {
        if ($request->search != '検索')
        {
            // dd('if');
            $dispatch_requests = DispatchRequest::all();
            // dd($dispatch_requests);
        }   else {
            // dd("else");
                if($request->cond_date == '' && $request->cond_customer == '')
                {
                    $dispatch_requests = DispatchRequest::all();
                    // dd($dispatch_requests);
                }
                elseif($request->cond_date != '' && $request->cond_customer != '')
                {
                    $keyword = $request->cond_customer;
                    $cond_customers = '%' . addcslashes($keyword, '%_\\') . '%';
                    $dispatch_requests = DispatchRequest::whereDate('start_datetime', $request->cond_date)->whereHas('customer', function($query) use ($cond_customers){
                        $query->where('name', 'like', $cond_customers);
                        })->get();
                    
                    // dd('両方');
                }
                elseif($request->cond_date == '' && $request->cond_customer != '')
                {
                    $keyword = $request->cond_customer;
                    $cond_customers = '%' . addcslashes($keyword, '%_\\') . '%';
                    $dispatch_requests = DispatchRequest::whereHas('customer', function($query) use ($cond_customers){
                        // dd($query);
                        $query->where('name','like', $cond_customers);
                        })->get();
                        // dd($dispatch_requests);
                }
                elseif($request->cond_date != '' && $request->cond_customer == '')
                {
                    $dispatch_requests = DispatchRequest::whereDate('start_datetime', $request->cond_date)->get();
                    // dd($dispatch_requests);
                }
        }
        
        return view('dispatch.request_index', ['dispatch_requests' => $dispatch_requests]);
    }
    
    public function edit(Request $request)
    {
        abort_if(Auth::user()->department_id == 4, 403, '権限がありません。');
        
        $dispatch_request = DispatchRequest::find($request->dispatch_request_id);
        // dd($car);
        if (empty($dispatch_request)){
            abort(404);
        }
        
        $customers = Customer::all();
        $locations = Location::all();
        $size_categories = SizeCategory::all();
        $abilities = Ability::all();
        $users = User::all();
        $cars = Car::all();
        
        return view('dispatch.request_edit', ['customers' => $customers,
                                            'locations' => $locations,
                                            'size_categories' => $size_categories,
                                            'abilities' => $abilities,
                                            'users' => $users,
                                            'cars' => $cars,
                                            ]);
    }
    
    public function update(Request $request)
    {
        if(Auth::user()->department_id == 1 || Auth::user()->department_id == 3)
        {
            $this->validate($request, DispatchRequest::$rules2);
            $dispatch_request = DispatchRequest::find($request->id);
            $form = $request->all();
            if($request->remove == 'true'){
                $form['image_path'] = null;
            }
            elseif($request->file('image')){
                $path = $request->file('image')->store('public/image');
                $form['image_path'] = basename($path);
            }
            
            $dispatch_request->fill($form)->save();
        }
        elseif(Auth::user()->department_id == 2){
            $this->validate($request, DispatchRequest::$rules);
            $request->has('approval_status');
            return redirect('/');
        }
        
    }
}
