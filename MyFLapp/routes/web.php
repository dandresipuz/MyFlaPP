<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('apartaments', 'App\Http\Controllers\ApartamentController');
    Route::resource('residentials', 'App\Http\Controllers\ResidentialController');
    Route::get('home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
});


/* Route::prefix('admin')->group(function () {
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('apartaments', 'App\Http\Controllers\ApartamentController');
    Route::resource('residentials', 'App\Http\Controllers\ResidentialController');
    Route::get('home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
}); */

/* Route::prefix('customer')->group(function () {
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('apartaments', 'App\Http\Controllers\ApartamentController');
    Route::resource('residentials', 'App\Http\Controllers\ResidentialController');
}); */
