<?php

use App\Arrival\Controllers\Arrivals;
use App\Arrival\Models\Arrival;
use Illuminate\Support\Facades\Route;
use Symfony\Contracts\EventDispatcher\Event;
use App\Arrival\Http\Controllers\ArrivalsController;
use App\Arrival\Http\Controllers\TestController;


Route::group([
    'prefix' => 'api/v1'
], function () {
	Route::get('arrivals', '\App\Arrival\Http\Controllers\ArrivalsController@index');
    // Route::get('arrivals', [ArrivalsController::class, 'index']);
    // Route::get('arrivals/{id}', [ArrivalsController::class, 'show']);
});

      
	