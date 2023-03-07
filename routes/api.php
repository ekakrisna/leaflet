<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\LayerController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    /*
     * Outlets Endpoints
     */
    Route::get('outlets', 'OutletController@index')->name('outlets.index');
    Route::get('points/{id}', 'PointsController@index')->name('points.index');
});

Route::post('addLayer', [LayerController::class, 'addLayer']);
Route::any('/health', ApiController::class);

//Route::get('/points/{data}', [PointsController::class, 'addPoints']);
