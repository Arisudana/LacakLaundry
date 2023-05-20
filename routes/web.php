<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('newOrder','App\Http\Controllers\newController@newOrder');
Route::post('dashboard/submitOrder','App\Http\Controllers\newController@submitOrder');
Route::get('dashboard','App\Http\Controllers\dashboardController@viewDashboard');
Route::get('login','App\Http\Controllers\loginController@viewLogin');
Route::post('/input','App\Http\Controllers\newController@submitOrder');
Route::get('','App\Http\Controllers\dashboardController@viewDashboard');
