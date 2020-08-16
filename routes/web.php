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

Route::get('/', function () {
    return view('welcome');
});
//auth routes
Auth::routes();

//customer register
Route::get('/customer-register','Auth\RegisterController@newCustomer')->name('customer.new');
//home
Route::get('/home', 'HomeController@index')->name('home');

//dashboard
Route::get('/dashboard','HomeController@dashboard')->name('dashboard');

//view of create new room
Route::get('/room','HotelController@newRoom')->name('room.new');

//create room
Route::post('/create-room','HotelController@createRoom')->name('room.save');

//search hotel
Route::get('/search-hotel','HotelController@searchHotel')->name('hotel.search');

//room list
Route::get('/room-list/{id}/{check_in}/{check_out}','HotelController@rooms')->name('booking.new');

//view room
Route::get('/view-room/{room}','HotelController@viewRoom')->name('room.view');

//make a payment and book a room
Route::post('/make-payment','BookingController@makePayment')->name('room.reserve');

//my bookings
Route::get('/booking-list','BookingController@bookingList')->name('booking.list');

//owner - view room list in a hotel
Route::get('/hotel','HotelController@roomList')->name('hotel.list');

//owner - view booking list
Route::get('/bookings','HotelController@bookings')->name('bookings');

//owner - view payment list
Route::get('/payments','HotelController@payments')->name('payments');

//delete room
Route::post('/delete-room/{room}','HotelController@deleteRoom')->name('delete.room');

//view hotel details
Route::get('/view-hotel','HotelController@viewHotel')->name('hotel.view');

//edit hotel details
Route::post('/update-hotel','HotelController@updateHotel')->name('hotel.update');
