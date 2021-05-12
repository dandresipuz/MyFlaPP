<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users/all', 'App\Http\Controllers\Api\UserController@all');
Route::resource('users', 'App\Http\Controllers\Api\UserController')->only('index', 'show');
Route::get('residentials/all', 'App\Http\Controllers\Api\ResidentialController@all');
Route::resource('residentials', 'App\Http\Controllers\Api\ResidentialController')->only('index', 'show');
Route::get('apartaments/all', 'App\Http\Controllers\Api\ApartamentController@all');
Route::resource('apartaments', 'App\Http\Controllers\Api\ApartamentController')->only('index', 'show');
