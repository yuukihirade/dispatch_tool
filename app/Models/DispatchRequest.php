<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Ability;
use App\Models\SizeCategory;
use App\Models\Car;
use App\Models\User;
use App\Models\Driver;

class DispatchRequest extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    protected $dates = [
        'start_datetime',
        'end_datetime',
    ];
    
    public static $rules = array(
        'start_datetime' => 'required',
        'end_datetime' => 'required',
        'customer_id' => 'required',
        'location_id' => 'required',
        'ability_id' => 'required',
        'size_category_id' => 'required',
        'method' => 'required',
        'user_id' => 'required',
    );
    
    public static $rules2 = array(
                'start_datetime' => 'required',
                'end_datetime' => 'required',
                'customer_id' => 'required',
                'location_id' => 'required',
                'ability_id' => 'required',
                'size_category_id' => 'required',
                'method' => 'required',
                'user_id' => 'required',
                'driver_id' => 'required',
                'car_id' => 'required',
                'approval_status' => 'required',
            );
    
    public static $rules3 = array(
                'approval_status' => 'required',
            );
    
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
    
    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }
    
    public function ability()
    {
        return $this->belongsTo('App\Models\Ability');
    }
    
    public function size_category()
    {
        return $this->belongsTo('App\Models\SizeCategory');
    }
    
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
    
}
