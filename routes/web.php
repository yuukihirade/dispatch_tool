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

Auth::routes();

use App\Http\Controllers\CarController;
Route::controller(CarController::class)->prefix('dispatch/')->name('dispatch.')->middleware('auth')->group(function() {
    Route::get('car/add', 'add')->middleware(['adminOrDispatch'])->name('car.add');
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
    Route::get('location/edit', 'edit')->name('location.edit');
    Route::post('location/edit', 'update')->name('location.update');
    Route::get('location/delete', 'delete')->name('location.delete');
});

use App\Http\Controllers\DispatchRequestController;
Route::controller(DispatchRequestController::class)->prefix('dispatch/')->name('dispatch.')->middleware('auth')->group(function() {
    Route::get('request/add', 'add')->name('request.add');
    Route::post('request/add', 'create')->name('request.create');
    Route::get('request/index', 'index')->name('request.index');
    Route::get('request/edit', 'edit')->name('request.edit');
    Route::post('request/edit', 'update')->name('request.update');
    Route::get('request/detail', 'detail')->name('request.detail');
    Route::get('request/date_accepted', 'dateAccepted')->name('request.date.accepted');
    Route::get('request/detail_accepted', 'detailAccepted')->name('request.detail.accepted');
    Route::post('request/detail_accepted', 'returnRequest')->name('request.return');
});

use App\Http\Controllers\DriverController;
Route::controller(DriverController::class)->prefix('driver')->name('driver.')->middleware('auth')->group(function() {
    Route::get('/add', 'add')->name('add');
    Route::post('/add', 'create')->name('create');
});

use App\Http\Controllers\CalendarController;
Route::controller(CalendarController::class)->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('calendar');
});

use App\Http\Controllers\UserController;
Route::controller(UserController::class)->prefix('admin/user')->name('admin.user.')->middleware('auth')->group(function() {
    Route::get('/index', 'index')->middleware(['admin'])->name('index');
    Route::get('/edit', 'edit')->middleware(['admin'])->name('edit');
    Route::post('/edit', 'update')->middleware(['admin'])->name('update');
    Route::get('/delete', 'delete')->middleware(['admin'])->name('delete');
});

use App\Http\Controllers\DriverDispatchController;
Route::controller(DriverDispatchController::class)->middleware('auth')->group(function() {
    Route::get('driver/dispatch', 'index')->name('driver.dispatch');
});

Auth::routes();

