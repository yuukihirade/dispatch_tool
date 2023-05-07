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
        
        $size_categories = SizeCategory::all();
        $abilities = Ability::all();
        
        
        if ($request->search !== '検索'){
            // dd('ifが実行された');
            $cars = Car::all();
            // dd($cars);
            // foreach($cars as $car){
            //     dd($car->size_category()->get()->first()->name);
            // }
        }
        
        else {
            // 車両サイズ,機能を両方選択したとき
            // dd($request->size_category_id . " : " . $request->ability_id);
            if($request->size_category_id != '' && $request->ability_id != ''){
                // dd('if動いた');
                $cars = Car::where('size_category_id', '=', $request->size_category_id)->where('ability_id', '=', $request->ability_id)->get();
            }
            // 車両サイズのみ選択されたとき
            else if($request->size_category_id != '' && $request->ability_id == ''){
                // dd('エルスイフ');
                $cars = Car::where('size_category_id', '=', $request->size_category_id)->get();
            } 
            // 機能のみ選択されたとき
            else if ($request->size_category_id == '' && $request->ability_id != ''){
                // dd('elseif動いた');
                $cars = Car::where('ability_id', '=', $request->ability_id)->get();
            }
            // 車両サイズ,機能を両方選択しなかったとき
            else {
                // dd('else');
                $cars = Car::all();
            }
            // dd($cars);
            
        }
        
        return view('dispatch.car_index', ['size_categories' => $size_categories, 'abilities' => $abilities, 'cars' => $cars]);
    }
    
    public function edit(Request $request)
    {
        $car = Car::find($request->car_id);
        // dd($car);
        if (empty($car)){
            abort(404);
        }
        
        $size_categories = SizeCategory::all();
        $abilities = Ability::all();
        
        return view('dispatch.car_edit', ['size_categories' => $size_categories, 'abilities' => $abilities, 'car' => $car ]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Car::$rules);
        
        $car = Car::find($request->id);
        
        $car_form = $request->all();
        
        unset($car_form['_token']);
        
        $car->fill($car_form)->save();
        
        
        return redirect('dispatch/car/index');
    }
    
    public function delete(Request $request)
    {
        $car = Car::find($request->car_id);
        
        $car->delete();
        
        return redirect('dispatch/car/index');
    }
    
}
