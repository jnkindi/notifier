<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// List all users
Route::get('users', 'UserController@index');

// Add new user
Route::post('user', 'UserController@store');

Route::group(['prefix'=>'user/{id}'],function(){
    // Get single user Info
    Route::get('', 'UserController@show');
    
    // Delete user
    Route::delete('', 'UserController@destroy');
    
    // Update user
    Route::put('/upgrade', 'UserController@update');

    // Notifications
    // Set the global limit rate from 
    $user_default_limit = env('DEFAULT_USER_RATE_LIMIT', 60);
    Route::middleware(["throttle:".$user_default_limit.", 1",'usermonthlyremainder'])->get('/notifications', 'NotificationController@index');
});



// Notification Route
// Route::middleware('throttle: 10|rate_limit,1')->get('notifications/{id}', function($id) {

