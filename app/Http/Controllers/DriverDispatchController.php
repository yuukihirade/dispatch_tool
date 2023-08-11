<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverDispatchController extends Controller
{
    //
    public function index()
    {
        return view('driver.dispatch');
    }
}
