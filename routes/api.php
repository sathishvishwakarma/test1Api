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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/friends/{userId}', 'ChatController@index');
Route::get('/{userId}', 'ChatController@show');
Route::post('/getMessage/{userID}/{friendId}', 'ChatController@getChat');
Route::post('/getLastMessage/{userID}/{friendId}', 'ChatController@getLastChat');
Route::post('/chat/sendChat', 'ChatController@sendChat');

