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
Route::post('login', 'AuthController@login')->name('login');
Route::post('register', 'AuthController@register')->name('register');

Route::group(['prefix' =>'v1', 'middleware' => 'api'], function(){


    Route::post('/register', 'Auth\RegisterController@create')->name('register');

    Route::resource('suhu', 'SuhuController',[
        'only' => ['store','index']
    ]);
    Route::resource('lampu', 'LampuController',[
        'only' => ['store','index']
    ]);
    Route::resource('devices', 'DevicesController',[
        'only' => ['update','show']
    ]);
    Route::resource('notifikasi','NotifikasiController',[
        'only' => ['store','update','index']
    ]);
});
