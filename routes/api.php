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
Route::get('/friends/{userId}', 'ChatController@index');//->middleware('auth')->name('chat.index');
Route::get('/{userId}', 'ChatController@show');//->middleware('auth')->name('chat.show');
Route::post('/getMessage/{userID}/{friendId}', 'ChatController@getChat');//->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat');//->middleware('auth');

