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
    
}
