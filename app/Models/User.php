<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Department;
use App\Models\DispatchRequest;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'department_id',
    ];
    
    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
        'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:8',
        'department_id' => 'required',
    );

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function department()
    {
        return $this->belongsTo('App\Models\Department');   
    }
    
    public function dispatch_requests()
    {
        return $this->hasMany('App\Models\DispatchRequest');
    }
    
    public function isAdmin()
    {
        return $this->department_id == 1;
    }
    
}
