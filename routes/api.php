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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth:api'], function () {
    Route::post('/short', 'UrlMapperController@store');
});

//users
Route::group(['prefix'  =>  'api/v1'], function(){
    Route::get('/', 'UserController@index');
    Route::get('/auth', 'UserController@create')->middleware('auth:api');
    Route::post('/getuser/{id}', 'UserController@update')->middleware('auth:api');
    Route::get('/update/{id}', 'UserController@destroy')->middleware('auth:api');
    Route::post('/store', 'UserController@store')->middleware('auth:api');
});