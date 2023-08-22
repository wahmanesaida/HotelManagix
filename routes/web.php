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
use App\Http\Controllers\CustomerReservationController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UsersController;
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



Route::get('/Booking_customer/available-roomtypes/{departure_date}', [CustomerReservationController::class, 'available_roomTypes']);
Route::get('/Booking_customer/available-rooms/{departure_date}/{room_type_id}', [CustomerReservationController::class, 'available_rooms']);
Route::resource('/Booking_customer', CustomerReservationController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index']);
    //booking
    Route::get('/reservation/{id}/delete',[ReservationController::class,'destroy']);
    //Route::get('/reservation/available-rooms/{departure_date}',[ReservationController::class,'available_rooms']);

    Route::get('/reservation/available-roomtypes/{departure_date}', [ReservationController::class, 'available_roomTypes']);
    Route::get('/reservation/available-rooms/{departure_date}/{room_type_id}', [ReservationController::class, 'available_rooms']);
    //reservation-list
    Route::get('/reservations_list', [ReservationController::class, 'showlist']);
    Route::get('/reservations_list/{id}/validate', [ReservationController::class, 'validateReservation'])->name('validateReservation');
    Route::get('/reservations_list/{id}/cancelled', [ReservationController::class, 'cancelReservation'])->name('cancelReservation');

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

    //Check Process
    Route::get('/checkin', [CheckController::class, 'checkin']);
    Route::get('/checkin/process/{id}', [CheckController::class, 'processCheckin'])->name('processCheckin');
    Route::get('/checkout', [CheckController::class, 'checkout']);
    Route::get('/checkout/process/{id}', [CheckController::class, 'processCheckout'])->name('processCheckout');

    //History
    Route::get('/History', [HistoryController::class, 'listt']);
    //users
    Route::get('/users/{id}/delete', [UsersController::class, 'destroy']);
    Route::resource('/users', UsersController::class);



});




