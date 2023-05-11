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
    Route::get('car/edit', 'edit')->name('car.edit');
    Route::post('car/update', 'update')->name('car.update');
    Route::get('car/delete', 'delete')->name('car.delete');
});

use App\Http\Controllers\CustomerController;
Route::controller(CustomerController::class)->prefix('customer/')->name('customer.')->middleware('auth')->group(function() {
    Route::get('add', 'add')->name('add');
    Route::post('add', 'create')->name('create');
    Route::get('index', 'index')->name('index');
});

use App\Http\Controllers\LocationController;
Route::controller(LocationController::class)->prefix('customer/')->name('customer.')->middleware('auth')->group(function() {
    Route::get('location/add', 'add')->name('location.add');
    Route::get('location/add', 'create')->name('location.create');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
