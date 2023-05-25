<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function viewDashboard(){
        return view('dashboard');
}
    public function orderTotals(){
    $totalOrders = DB::connection('mysql')->table('orders')->count();

    $currentMonth = now()->format('Y-m');
    $currentMonthOrders = DB::connection('mysql')
        ->table('orders')
        ->whereRaw('DATE_FORMAT(orderDate, "%Y-%m") = ?', [$currentMonth])
        ->count();

    $lastMonth = now()->subMonth()->format('Y-m');
    $lastMonthOrders = DB::connection('mysql')
        ->table('orders')
        ->whereRaw('DATE_FORMAT(orderDate, "%Y-%m") = ?', [$lastMonth])
        ->count();

    $orderTotals = [
        'totalOrders' => $totalOrders,
        'currentMonthOrders' => $currentMonthOrders,
        'lastMonthOrders' => $lastMonthOrders,
    ];

    return view('dashboard', compact('orderTotals'));
    }
}
