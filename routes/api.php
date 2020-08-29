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
	Route::post('logout-user', 'LogoutController');
});

Route::middleware(['auth', 'role'])->name('admin')->group(function(){

	Route::post('register-admin', 'AdminController@store');
	Route::get('check-admin/{id}', 'AdminController@show');

	//BUKU
	Route::post('register-buku', 'BukuController@store');
	Route::patch('update-buku/{id}', 'BukuController@update');
	Route::delete('delete-buku/{buku}', 'BukuController@destroy');

	//PINJAMAN
	Route::post('register-pinjaman', 'PinjamanController@store');
	Route::get('check-pinjaman/{id}', 'PinjamanController@show');
	Route::patch('update-pinjaman/{id}', 'PinjamanController@update');
	Route::delete('delete-pinjaman/{id}', 'PinjamanController@destroy');


});

Route::middleware(['auth'])->group(function() {
	Route::post('register-mahasiswa', 'MahasiswaController@store');
	Route::get('check-mahasiswa/{id}', 'MahasiswaController@show');
	Route::patch('update-mahasiswa/{id}', 'MahasiswaController@update');
	Route::delete('delete-mahasiswa/{id}', 'MahasiswaController@destroy');
});

Route::get('check-user', 'UserController');
