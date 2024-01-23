<?php 

use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'api/v1'
], function () {
	Route::post('register', '\AppUser\User\Http\Controllers\UsersController@register');
    Route::get('userss', '\AppUser\User\Http\Controllers\UsersController@index'); 
});