<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DispatchRequest;

class Driver extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
    );
    public function dispatch_requests()
    {
        return $this->hasMany('App\Models\DispatchRequest');
    }
}
