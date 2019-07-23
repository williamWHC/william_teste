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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('drivers')->group(function() {

    Route::get('/', 'DriverController@index')->name('drivers.index');
    Route::get('/create', 'DriverController@create')->name('drivers.create');
    Route::post('/store', 'DriverController@store')->name('drivers.store');
    Route::get('/edit/{driver}', 'DriverController@edit')->name('drivers.edit');
    Route::put('/update/{driver}', 'DriverController@update')->name('drivers.update');

});

Route::prefix('passengers')->group(function() {

    Route::get('/', 'PassengerController@index')->name('passengers.index');
    Route::get('/create', 'PassengerController@create')->name('passengers.create');
    Route::post('/store', 'PassengerController@store')->name('passengers.store');
    Route::get('/edit/{passenger}', 'PassengerController@edit')->name('passengers.edit');
    Route::put('/update/{passenger}', 'PassengerController@update')->name('passengers.update');

});

Route::prefix('journeys')->group(function() {

    Route::get('/', 'JourneyController@index')->name('journeys.index');
    Route::get('/create', 'JourneyController@create')->name('journeys.create');
    Route::post('/store', 'JourneyController@store')->name('journeys.store');

});