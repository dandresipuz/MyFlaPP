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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');
    Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [\App\Http\Controllers\Api\AuthController::class, 'refresh'])->name('refresh');
    Route::post('me', [\App\Http\Controllers\Api\AuthController::class, 'me'])->name('me');
});

Route::get('users/all', 'App\Http\Controllers\Api\UserController@all');
Route::resource('users', 'App\Http\Controllers\Api\UserController')->only('index', 'show');
// User create, update, delete
Route::post('users', 'App\Http\Controllers\Api\UserController@store');
Route::put('users/{user}', 'App\Http\Controllers\Api\UserController@update');
Route::delete('users/{user}', 'App\Http\Controllers\Api\UserController@destroy');


Route::get('residentials/all', 'App\Http\Controllers\Api\ResidentialController@all');
Route::get('residentials/user/{user}', 'App\Http\Controllers\Api\ResidentialController@user');
Route::resource('residentials', 'App\Http\Controllers\Api\ResidentialController')->only('index', 'show');
// Residential create, update, delete
Route::post('residentials', 'App\Http\Controllers\Api\ResidentialController@store');
Route::put('residentials/{residential}', 'App\Http\Controllers\Api\ResidentialController@update');
Route::delete('residentials/{residential}', 'App\Http\Controllers\Api\ResidentialController@destroy');

Route::get('apartaments/all', 'App\Http\Controllers\Api\ApartamentController@all');
Route::get('apartaments/residential/{residential}', 'App\Http\Controllers\Api\ApartamentController@residential');
Route::resource('apartaments', 'App\Http\Controllers\Api\ApartamentController')->only('index', 'show');
Route::get('apartaments/user/{user}', 'App\Http\Controllers\Api\ApartamentController@user');
// Apartament create, update, delete
Route::post('apartaments', 'App\Http\Controllers\Api\ApartamentController@store');
Route::put('apartaments/{apartament}', 'App\Http\Controllers\Api\ApartamentController@update');
Route::delete('apartaments/{apartament}', 'App\Http\Controllers\Api\ApartamentController@destroy');
