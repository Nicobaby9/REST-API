<?php

use Illuminate\Http\Request;

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

Route::namespace('Auth')->group(function(){

	Route::post('register-user', 'RegisterController');
	Route::post('login-user', 'LoginController');
	Route::post('logout', 'LogoutController');
});

Route::middleware('auth:api')->group(function(){

	Route::post('create-new-admin', 'AdminController@store');
	Route::get('login-admin/{id}', 'AdminController@show');
	// Route::post('logout', 'LogoutController');
});

Route::get('user', 'UserController');

// Route::post('register-mahasiswa', 'MahasiswaController@store');