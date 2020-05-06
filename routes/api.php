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

// Get single user Info
Route::get('user/{id}', 'UserController@show');

// Add new user
Route::post('user', 'UserController@store');

// Update user
Route::put('user/{id}/upgrade', 'UserController@update');

// Delete user
Route::delete('user/{id}', 'UserController@destroy');