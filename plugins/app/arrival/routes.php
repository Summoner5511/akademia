<?php

use App\Arrival\Controllers\Arrivals;
use App\Arrival\Models\Arrival;
use Illuminate\Support\Facades\Route;
use Symfony\Contracts\EventDispatcher\Event;

Route::get('/arrivals', function () {
    return Arrival::all();
});
Route::post('/arrivals', function(){
	$arrival = new Arrival();
	$arrival->name = post('name');
	$arrival->save();
	

	return $arrival;
});
      
	