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
    
    /*size_categories_tableを参照するメソッド
    例：　$car->size_category->name
    で下記のsize_category()というメソッドを使って
    size_categories_tableを参照し、->nameで
    そのテーブルにあるnameという値を取得できる
    ※viewファイルで書くときはこの省略形の書き方が許されている
    省略しないと
    $car->size_category()->get()->first()->name;
    
    */
    public function size_category()
    {
        return $this->belongsTo('App\Models\SizeCategory');
    }
    /*下記メソッドも上記メソッドと同じ要領*/
    
    public function ability()
    {
        return $this->belongsTo('App\Models\Ability');
    }
}
