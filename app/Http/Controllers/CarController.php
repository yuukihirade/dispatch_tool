<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SizeCategory;

use App\Models\Ability;

use App\Models\Car;

class CarController extends Controller
{
    //
    public function add()
    {
        // dd('add');
        $size_categories = SizeCategory::all();
        $abilities = Ability::all();
        return view('dispatch.car_create', ['size_categories' => $size_categories, 'abilities' => $abilities]);
    }
    
    public function create(Request $request)
    {
        // dd($request);
        $this->validate($request, Car::$rules);
        
        $car = new Car;
        $form = $request->all();
        
        unset($form['_token']);
        
        $car->fill($form)->save();
        
        return redirect('dispatch/car/index');
        
    }
    
    public function index(Request $request)
    {
        return view('dispatch.car_index');
    }
}
