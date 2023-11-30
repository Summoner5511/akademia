<?php 

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'api/v1'
], function () {
	Route::post('login', '\AppUser\User\Http\Controllers\UsersController@recieve');
    Route::get('login', '\AppUser\User\Http\Controllers\UsersController@index'); 
});