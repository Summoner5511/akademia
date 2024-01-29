<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api/v1'
], function () {
        
	    Route::get('traps', '\Krupka\Trapmanager\Http\Controllers\TrapsController@index');
        //Route::get('arrivals', [ArrivalsController::class, 'index']);
        Route::get('traps/{id}', '\Krupka\Trapmanager\Http\Controllers\TrapsController@show');
});