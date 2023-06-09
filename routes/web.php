<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\performanceController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\SettingsAdminController;
use App\Http\Controllers\SettingsStaffController;
use App\Http\Controllers\revenueDetailController;
use App\Http\Controllers\OrdersController;

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
    return redirect(route('dashboard'));
});

Route::middleware(['guest'])->group(function(){
    Route::get('login', [loginController::class, 'viewLogin'])->name('login');
    Route::post('login', [loginController::class, 'login']);
});

Route::middleware(['authAdminStaff'])->group(function(){

    Route::get('admin', function () {
        return "admin";
    })->name('admin')->middleware('role:admin');

    Route::get('staff', function () {
        return "staff";
    })->name('staff')->middleware('role:staff');

    Route::get('dashboard', [dashboardController::class, 'viewDashboard'])->name('dashboard');
    Route::get('performance', [performanceController::class, 'viewPerformance'])->name('performance');
    Route::get('newOrder', [newController::class, 'newOrder'])->name('newOrder');
    Route::get('revenueDetail', [revenueDetailController::class, 'viewRevenueDetail'])->name('revenueDetail');
    Route::get('viewOrder', [OrdersController::class, 'viewOrder'])->name('viewOrder');
    Route::get('logout', [loginController::class, 'logout'])->name('logout');
    Route::post('/input', [newController::class, 'submitOrder']);
    Route::get('/settings', [SettingsAdminController::class, 'SettingsAdmin'])->name('SettingAdmin');
    // Route::get('/settings', [SettingsStaffController::class, 'SettingsStaff'])->name('SettingsStaff')->middleware('role:staff');
});



