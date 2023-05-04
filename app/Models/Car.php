<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SizeCategory;
use App\Models\Ability;

class Car extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'registration_number' => 'required',
        'size_category_id' => 'required',
        'ability_id' => 'required',
    );
    
    
    public function size_categories()
    {
        return $this->belongsTo('App\Models\SizeCategory');
    }
    
    public function abilities()
    {
        return $this->belongsTo('App\Models\Ability');
    }
}
