<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomehotelController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\userauthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ClientConroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/homehotel',[HomehotelController::class, 'homehotel']);
Route::get('/about',[AboutController::class, 'about']);

Route::get('/header-about',[AboutController::class, 'headerAbout']);
Route::get('/rooms',[RoomController::class, 'room']);
Route::get('/room-detail',[RoomTypeController::class, 'roomdetails']);
Route::get('/restaurant',[RestaurantController::class, 'restaurant']);

// Booking_custmer

Route::get('/Booking_customer', [ReservationController::class, 'customer_create']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index']);
    //booking
    Route::get('/reservation/{id}/delete',[ReservationController::class,'destroy']);
    //Route::get('/reservation/available-rooms/{departure_date}',[ReservationController::class,'available_rooms']);

    Route::get('/reservation/available-roomtypes/{departure_date}', [ReservationController::class, 'available_roomTypes']);
    Route::get('/reservation/available-rooms/{departure_date}/{room_type_id}', [ReservationController::class, 'available_rooms']);

    Route::resource('/reservation',ReservationController::class);
    //RoomType Crud operation
    Route::get('/roomtype/{id}/delete', [RoomTypeController::class, 'destroy']);
    Route::resource('/roomtype', RoomTypeController::class);

    //Room CRUD operation
    Route::get('/room/{id}/delete', [RoomController::class, 'destroy']);
    Route::resource('/room', RoomController::class);

    //Client CRUD
    Route::get('/client/{id}/delete', [ClientConroller::class, 'destroy']);
    Route::resource('/client', ClientConroller::class);


});




