<?php

use App\Http\Controllers\PointsController;

Route::get('/', 'OutletMapController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('points/{data}', 'PointsController');
//Route::get('/points/{data}', [PointsController::class, 'addPoints']);
Route::any('points', 'PointsController@addPoints')->name('points.addPoints');
/*
 * Outlets Routes
 */
Route::get('/our_outlets', 'OutletMapController@index')->name('outlet_map.index');
Route::resource('outlets', 'OutletController');
Route::resource('layers', 'LayerController');
