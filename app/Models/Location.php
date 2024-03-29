<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\DispatchRequest;

class Location extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'customer_id' => 'required',
        'name' => 'required',
    );
    
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');  
    }
    
    public function dispatch_requests()
    {
        return $this->hasMany('App\Models\DispatchRequest');
    }
    
    public function hasMultipleMapImages()
    {
        return strpos($this->map_path, ",") !== false; //map_path文字列が,から始まる場合strposは0(falsy)を返すので、!==falseとしている
    }
    
    public function createMapPathsArray()
    {
        return  explode(',', $location->map_path);
    }
    
}
