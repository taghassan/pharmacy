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
    return view('welcome');
});
Route::get('/ph_report', function () {
    return view('ph_report');
});
Route::get('/create_ph', function () {
    return view('create_ph');
});
Route::get('/dr_report/{id}/id', function ($id) {
    return view('dr_report',compact('id'));
});
Route::get('/show_user/{id}', function ($id) {
    return view('show_user',compact('id'));
});
Route::get('/ph_us_report/{id}', function ($id) {
    return view('ph_us_report',compact('id'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Pharmacy', 'PharmacyController');
Route::put('Pharmacy/{id}/update', 'PharmacyController@update');
Route::get('Pharmacy/{id}/delete', 'PharmacyController@destroy');
Route::resource('user', 'usercontroller');
Route::get('user/{id}/delete', 'usercontroller@destroy');
Route::resource('drugs', 'DrugsController');
Route::put('drugs/{id}/update', 'DrugsController@update');
Route::get('drugs/{id}/delete', 'DrugsController@destroy');
