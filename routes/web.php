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
    Route::get('/view/{role}', 'UserController@index')->middleware('auth');
    Route::get('/view/merchant/{id}', 'UserController@viewMerchantAgent')->middleware('auth');
    Route::get('/create', 'UserController@create')->middleware('auth');
    Route::post('/change_status/{id}', 'UserController@change_status')->middleware('auth');
    Route::get('/delete/{id}', 'UserController@destroy')->middleware('auth');
    Route::post('/store', 'UserController@store')->middleware('auth');
    Route::post('/move/{id}', 'UserController@moveAgentToAnotherMerchant')->middleware('auth');
});

//credit balance
Route::group(['prefix'  =>  'credit'], function(){
    Route::get('/', 'CreditController@index')->middleware('auth');
    Route::post('/storeOrUpdate', 'CreditController@storeOrUpdate')->middleware('auth');
});

//game name
Route::group(['prefix'  =>  'game_name'], function(){
    Route::get('/', 'GameNameController@index')->middleware('auth');
    Route::post('/store', 'GameNameController@store')->middleware('auth');
    Route::post('/update/{id}', 'GameNameController@update')->middleware('auth');
    Route::get('/delete/{id}', 'GameNameController@destroy')->middleware('auth');
});

//game type
Route::group(['prefix'  =>  'game_type'], function(){
    Route::get('/', 'GameTypeController@index')->middleware('auth');
    Route::post('/store', 'GameTypeController@store')->middleware('auth');
    Route::post('/update/{id}', 'GameTypeController@update')->middleware('auth');
    Route::get('/delete/{id}', 'GameTypeController@destroy')->middleware('auth');
});

//game type option
Route::group(['prefix'  =>  'game_type_option'], function(){
    Route::get('/', 'GameTypeOptionsController@index')->middleware('auth');
    Route::post('/store', 'GameTypeOptionsController@store')->middleware('auth');
    Route::post('/update/{id}', 'GameTypeOptionsController@update')->middleware('auth');
    Route::get('/delete/{id}', 'GameTypeOptionsController@destroy')->middleware('auth');
});

//game type option
Route::group(['prefix'  =>  'game_quater'], function(){
    Route::get('/', 'GameQuaterController@index')->middleware('auth');
    Route::post('/store', 'GameQuaterController@store')->middleware('auth');
    Route::post('/update/{id}', 'GameQuaterController@update')->middleware('auth');
    Route::get('/delete/{id}', 'GameQuaterController@destroy')->middleware('auth');
});

//game full Information
Route::group(['prefix'  =>  'game'], function(){
    Route::get('/', 'GameController@index')->middleware('auth');
    Route::post('/store', 'GameController@store')->middleware('auth');
    Route::post('/update/{id}', 'GameController@update')->middleware('auth');
    Route::get('/delete/{id}', 'GameController@destroy')->middleware('auth');
});

//Winnings
Route::group(['prefix'  =>  'winning'], function(){
    Route::get('/', 'WinningsController@index')->middleware('auth');
    Route::get('/create', 'WinningsController@create')->middleware('auth');
    Route::get('/activate/{id}', 'WinningsController@activateWinning')->middleware('auth');
    Route::get('/activate/one/{id}', 'GameTransactionsController@activateOneWinning')->middleware('auth');
    Route::post('/store', 'WinningsController@store')->middleware('auth');
    Route::post('/update/{id}', 'WinningsController@update')->middleware('auth');
    Route::get('/delete/{id}', 'WinningsController@destroy')->middleware('auth');
});

//Transaction
Route::group(['prefix'  =>  'transaction'], function(){
    Route::get('/', 'GameTransactionsController@index')->middleware('auth');
});

//Report
Route::group(['prefix'  =>  'game'], function(){
    Route::get('/report', 'GameReportController@index')->middleware('auth');
    Route::post('/view/report', 'GameReportController@report')->middleware('auth');
    Route::get('/report/pdf/{from}/{to}', 'GameReportController@generatePdf')->middleware('auth');
    Route::get('/report/excel/{from}/{to}', 'GameReportController@generateExcel')->middleware('auth');
});

Route::get('/download', 'GameController@download');