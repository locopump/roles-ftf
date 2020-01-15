<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['api'], function () {
    Route::get('users/{id?}', 'API\Intranet\UserController@getUser');
    Route::post('users/create', 'API\Intranet\UserController@addUser');
    Route::post('users/update', 'API\Intranet\UserController@updateUser');
    Route::post('users/delete', 'API\Intranet\UserController@deleteUser');
});
