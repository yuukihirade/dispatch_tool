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
    Route::get('car/add', 'add')->middleware(['admin','dispatch'])->name('car.add');
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
    Route::get('detail', 'detail')->name('detail');
});

use App\Http\Controllers\LocationController;
Route::controller(LocationController::class)->prefix('customer/')->name('customer.')->middleware('auth')->group(function() {
    Route::get('location/add', 'add')->name('location.add');
    Route::post('location/add', 'create')->name('location.create');
});

use App\Http\Controllers\DispatchRequestController;
Route::controller(DispatchRequestController::class)->prefix('dispatch/')->name('dispatch.')->middleware('auth')->group(function() {
    Route::get('request/add', 'add')->name('request.add');
    Route::post('request/add', 'create')->name('request.create');
    Route::get('request/index', 'index')->name('request.index');
    Route::get('request/edit', 'edit')->name('request.edit');
    Route::post('request/edit', 'update')->name('request.update');
    Route::get('request/detail', 'detail')->name('request.detail');
});

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
