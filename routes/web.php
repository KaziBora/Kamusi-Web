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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	//Route::resource('users', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	//Route::get('users/create', ['as' => 'users.create', 'uses' => 'App\Http\Controllers\UserController@create']);
	//Route::post('users/store', ['as' => 'users.store', 'uses' => 'App\Http\Controllers\UserController@store']);
	
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', 'App\Http\Controllers\UserController@index')->name('index');
        Route::get('edit/{user}/user', 'App\Http\Controllers\UserController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\UserController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\UserController@store')->name('store');
        Route::post('u/{user}/update', 'App\Http\Controllers\UserController@update')->name('update');
        Route::get('d/{user}/delete', 'App\Http\Controllers\UserController@destroy')->name('delete');
    });

	Route::get('maneno', function () {return view('pages.upgrade');})->name('maneno');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

