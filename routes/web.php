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
	Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', 'App\Http\Controllers\UserController@index')->name('index');
        Route::get('edit/{user}/user', 'App\Http\Controllers\UserController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\UserController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\UserController@store')->name('store');
        Route::post('u/{user}/update', 'App\Http\Controllers\UserController@update')->name('update');
        Route::get('d/{user}/delete', 'App\Http\Controllers\UserController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', 'App\Http\Controllers\CategoryController@index')->name('index');
        Route::get('edit/{category}/category', 'App\Http\Controllers\CategoryController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('store');
        Route::post('u/{category}/update', 'App\Http\Controllers\CategoryController@update')->name('update');
        Route::get('d/{category}/delete', 'App\Http\Controllers\CategoryController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'words', 'as' => 'words.'], function () {
        Route::get('/', 'App\Http\Controllers\WordController@index')->name('index');
        Route::get('edit/{word}/word', 'App\Http\Controllers\WordController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\WordController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\WordController@store')->name('store');
        Route::post('u/{word}/update', 'App\Http\Controllers\WordController@update')->name('update');
        Route::get('d/{word}/delete', 'App\Http\Controllers\WordController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'proverbs', 'as' => 'proverbs.'], function () {
        Route::get('/', 'App\Http\Controllers\ProverbController@index')->name('index');
        Route::get('edit/{proverb}/proverb', 'App\Http\Controllers\ProverbController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\ProverbController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\ProverbController@store')->name('store');
        Route::post('u/{proverb}/update', 'App\Http\Controllers\ProverbController@update')->name('update');
        Route::get('d/{proverb}/delete', 'App\Http\Controllers\ProverbController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'sayings', 'as' => 'sayings.'], function () {
        Route::get('/', 'App\Http\Controllers\SayingController@index')->name('index');
        Route::get('edit/{saying}/saying', 'App\Http\Controllers\SayingController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\SayingController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\SayingController@store')->name('store');
        Route::post('u/{saying}/update', 'App\Http\Controllers\SayingController@update')->name('update');
        Route::get('d/{saying}/delete', 'App\Http\Controllers\SayingController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'idioms', 'as' => 'idioms.'], function () {
        Route::get('/', 'App\Http\Controllers\IdiomController@index')->name('index');
        Route::get('edit/{idiom}/idiom', 'App\Http\Controllers\IdiomController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\IdiomController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\IdiomController@store')->name('store');
        Route::post('u/{idiom}/update', 'App\Http\Controllers\IdiomController@update')->name('update');
        Route::get('d/{idiom}/delete', 'App\Http\Controllers\IdiomController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'trivia', 'as' => 'trivia.'], function () {
        Route::get('/', 'App\Http\Controllers\TriviaController@index')->name('index');
        Route::get('edit/{trivia}/trivia', 'App\Http\Controllers\TriviaController@edit')->name('edit');
        Route::get('create', 'App\Http\Controllers\TriviaController@create')->name('create');
        Route::post('store', 'App\Http\Controllers\TriviaController@store')->name('store');
        Route::post('u/{trivia}/update', 'App\Http\Controllers\TriviaController@update')->name('update');
        Route::get('d/{trivia}/delete', 'App\Http\Controllers\TriviaController@destroy')->name('delete');
    });
    
	Route::get('leaderboard', function () {return view('pages.upgrade');})->name('leaderboard');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

