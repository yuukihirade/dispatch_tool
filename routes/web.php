<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\CarController;
Route::controller(CarController::class)->prefix('dispatch/')->name('dispatch.')->middleware('auth')->group(function() {
    Route::get('car/add', 'add')->name('car.add');
    Route::post('car/add', 'create')->name('car.create');
    Route::get('car/index', 'index')->name('car.index');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
