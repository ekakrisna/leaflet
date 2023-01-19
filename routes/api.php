<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\PointsController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('outlets', 'OutletController@index')->name('outlets.index');
    Route::get('/points', 'PointsController@addPoints')->name('points.addPoints');
});

Route::any('/health', ApiController::class);

//Route::get('/points/{data}', [PointsController::class, 'addPoints']);
