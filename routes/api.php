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

Route::get('columns', 'ColumnsController@index');

Route::get('columns/{id}', 'ColumnsController@show');

Route::post('cards/{id}', 'CardsController@store');

Route::put('columns/{id}/capacity', 'ColumnsController@setCapacity');

Route::put('columns/{id}/cards', 'ColumnsController@updateCards');

Route::put('cards/{id}/{toId}', 'CardsController@changeColumn');

//Route::post('add', 'CardsController@store');

//Route::put('move/{id}/{name}/{capacity}/{count}', 'CardsController@update');
