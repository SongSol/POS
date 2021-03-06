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

Route::get('/getMenu','MenuController@getMenu');

Route::post('/regOrder','TableController@regOrder');

Route::get('/getOrder/{table_no}','TableController@getOrder');

Route::post('/payment','ProfitController@payment');

Route::get('/getProfit/{date}','ProfitController@getProfit');

Route::get('/getAllOrder','TableController@getAllOrder');

Route::post('/regMenu','MenuController@regMenu');

Route::get('/getAllProfit','ProfitController@getAllProfit');