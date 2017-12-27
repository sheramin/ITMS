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
    return view('index');
});

Route::prefix('devices')->group(function(){
	Route::get('/add_form', 'DevicesController@index')->name('add.new.form');
	Route::post('/submit', 'DevicesController@store')->name('submit.new.device');
	Route::get('/list', 'DevicesController@show')->name('list.devices');
	Route::get('/edit/{id}', 'DevicesController@edit')->name('edit');
	Route::get('/delete/{id}', 'DevicesController@destroy')->name('delete');
	Route::post('/update/{id}', 'DevicesController@update')->name('submit.update');
});

Route::prefix('requests')->group(function(){
	Route::post('/submit', 'RequestsController@store')->name('submit.request');
	Route::get('/form', 'RequestsController@index')->name('new.request');
	Route::get('/list', 'RequestsController@show')->name('list.request');
	Route::get('/delete/{id}', 'RequestsController@destroy')->name('delete.request'); // still not used, should be by ajax.
});

Route::prefix('help')->group(function(){
	Route::post('/submit', 'helpController@store')->name('submit.help_request');
});


