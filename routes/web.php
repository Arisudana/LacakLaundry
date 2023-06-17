<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\performanceController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\revenueDetailController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrdersController1;
use App\Http\Controllers\settingsOrderController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('login', [loginController::class, 'viewLogin'])->name('login');
    Route::post('login', [loginController::class, 'login']);
});

Route::middleware(['authAdminStaff'])->group(function () {

    Route::get('admin', function () {
        return "admin";
    })->name('admin')->middleware('role:admin');

    Route::get('staff', function () {
        return "staff";
    })->name('staff')->middleware('role:staff');

    Route::get('ongoing', [ordersController1::class, 'viewOngoingProgress'])->name('ongoing');
    Route::post('/ongoing/washed', [ordersController1::class, 'storeOngoingWashed']);
    Route::post('/ongoing/ironed', [ordersController1::class, 'storeOngoingIroned']);
    Route::post('/ongoing/ready', [ordersController1::class, 'storeOngoingReady']);

    Route::get('overdue', [ordersController1::class, 'viewOverdueProgress'])->name('overdue');
    Route::post('/overdue/washed', [ordersController1::class, 'storeOverdueWashed']);
    Route::post('/overdue/ironed', [ordersController1::class, 'storeOverdueIroned']);
    Route::post('/overdue/ready', [ordersController1::class, 'storeOverdueReady']);

    Route::get('finished', [ordersController1::class, 'viewFinished'])->name('finished');


    Route::get('dashboard', [dashboardController::class, 'viewDashboard'])->name('dashboard');
    Route::get('performance', [performanceController::class, 'viewPerformance'])->name('performance');
    Route::get('newOrder', [newController::class, 'newOrder'])->name('newOrder');
    Route::get('revenueDetail', [revenueDetailController::class, 'viewRevenueDetail'])->name('revenueDetail');
    Route::get('viewOrder', [OrdersController::class, 'viewOrder'])->name('viewOrder');
    Route::get('logout', [loginController::class, 'logout'])->name('logout');
    Route::post('/input', [newController::class, 'submitOrder']);
    Route::get('settings/order', [settingsOrderController::class, 'viewSettingsOrder']);
    Route::post('/settings/save', [settingsOrderController::class, 'updateOrderSettings']);

    Route::controller(SettingsController::class)->group(function () {
        Route::get('/settings', 'Settings');
        Route::get('/settings/edit/{id}', 'SettingsEditProfile');
        Route::post('/settings/edit/update', 'SubmitEdit');
        Route::get('/settings/staff', 'SettingsListStaff');
        Route::get('/settings/staff/add', 'SettingsAddStaff');
        Route::post('/settings/store', 'SettingsStaffAdd');
    });
});
