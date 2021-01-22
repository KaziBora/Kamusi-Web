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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/questions', 'ApiController@questions_fetch');
Route::get('/words', 'App\Http\Controllers\ApiController@getWords');

Route::get('/categories', 'App\Http\Controllers\ApiController@getCategories');
Route::get('/trivia', 'App\Http\Controllers\ApiController@getTrivia');