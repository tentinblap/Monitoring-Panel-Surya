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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/panel1/grafik1', 'Grafik1Controller@index')->name('grafik1');
Route::get('/panel2/grafik2', 'Grafik2Controller@index')->name('grafik2');
Route::get('/panel3/grafik3', 'Grafik3Controller@index')->name('grafik3');
// Route::get('/panel2/grafik', 'GrafikController@index')->name('grafik');

Route::get('/controll', 'GrafikController@controll')->name('controll');
Route::get('/suhu', 'SuhuController@indexSuhu')->name('suhu');
Route::get('/lampu', 'LampuController@indexLampu')->name('lampu');
Route::get('/panel1/log1', 'Log1Controller@index')->name('log1');
Route::get('/panel2/log2', 'Log2Controller@index')->name('log2');
Route::get('/panel3/log3', 'Log3Controller@index')->name('log3');

