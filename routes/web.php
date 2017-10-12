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
    return view('auth.login');
});

Auth::routes();
//Logout
Route::get('/logout', 'Auth\\LogoutController@logout');



Route::group(['prefix' => 'dashboard'], function(){
    Route::get('/', 'DashboardController@index')->middleware('auth');
});



//users
Route::group(['prefix'  =>  'users'], function(){
    Route::get('/', 'UserController@index');
    Route::get('/create', 'UserController@create');
    Route::post('/update/{id}', 'UserController@update');
    Route::get('/delete/{id}', 'UserController@destroy');
    Route::post('/store', 'UserController@store');
});


//credit balance
Route::group(['prefix'  =>  'credit'], function(){
    Route::get('/', 'CreditController@index');
    Route::post('/storeOrUpdate', 'CreditController@storeOrUpdate');
});

//credit balance
Route::group(['prefix'  =>  'game_name'], function(){
    Route::get('/', 'GameController@index');
    Route::post('/store', 'GameController@store');
    Route::post('/update/{id}', 'GameController@update');
    Route::post('/delete/{id}', 'GameController@destroy');
});

//credit balance
Route::group(['prefix'  =>  'game_type'], function(){
    Route::get('/', 'GameTypeController@index');
    Route::post('/store', 'GameTypeController@store');
    Route::post('/update/{id}', 'GameTypeController@update');
    Route::post('/delete/{id}', 'GameTypeController@destroy');
});

//credit balance
Route::group(['prefix'  =>  'game_type_option'], function(){
    Route::get('/', 'GameTypeOptionController@index');
    Route::post('/store', 'GameTypeOptionController@storeOrUpdate');
    Route::post('/update/{id}', 'GameTypeOptionController@update');
    Route::post('/delete/{id}', 'GameTypeOptionController@destroy');
});