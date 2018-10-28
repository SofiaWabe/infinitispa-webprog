<?php

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
    return view('dashboard');
})->middleware('auth');

Auth::routes();

// Route::group(['middleware'=>['auth', 'Role:1']], function(){
//     Route::get('/dashboard', 'DashboardController@index');
//     Route::resource('service-category', 'ServiceCategoryController');
//     Route::resource('service-duration', 'ServiceDurationController');
//     Route::resource('service', 'ServiceController');
//     Route::resource('room', 'RoomController');
//     Route::resource('therapist-position', 'TherapistPositionController');
//     Route::resource('therapist', 'TherapistController');
//     Route::resource('location-rate', 'LocationRateController');
//     Route::resource('discount', 'DiscountController');
//     Route::resource('reservation', 'ReservationController');
//     Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
//     Route::resource('user-management', 'UserManagementController');
// });

// Route::group(['middleware'=>['auth', 'Role:0']], function(){
//     Route::get('/dashboard', 'DashboardController@index');
//     Route::resource('reservation', 'ReservationController');
// });
Route::get('/dashboard', 'DashboardController@index');
Route::resource('service-category', 'ServiceCategoryController');
Route::resource('service-duration', 'ServiceDurationController');
Route::resource('service', 'ServiceController');
Route::resource('room', 'RoomController');
Route::resource('therapist-position', 'TherapistPositionController');
Route::resource('therapist', 'TherapistController');
Route::resource('location-rate', 'LocationRateController');
Route::resource('discount', 'DiscountController');

Route::resource('reservation', 'ReservationController');
Route::resource('appointment', 'AppointmentController');
Route::resource('walk-in', 'WalkInController');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::resource('profile', 'ProfileController');