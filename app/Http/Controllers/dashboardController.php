<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
<<<<<<< Updated upstream
=======
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\View\View;
>>>>>>> Stashed changes

class dashboardController extends Controller
{
<<<<<<< HEAD
    public function viewDashboard(){

        $orderTotals = $this->orderTotals();
        return view('dashboard')->with(compact('orderTotals'));
=======
    public function viewDashboard()
    {
        $orderTotals = $this->orderTotals();
        $chartData = $this->chart();

        $labels = $chartData['labels'];
        $values = $chartData['values'];
        return view('dashboard')->with(compact('orderTotals', 'labels', 'values'));
    }
    public function orderTotals()
    {
        date_default_timezone_set('Asia/Jakarta');
        $totalOrders = DB::connection('mysql')->table('orders')->count();

        $currentMonthOrders = DB::table('orders')
        ->whereYear('orderDate', now()->year)
        ->whereMonth('orderDate', now()->month)
        ->count();

    $lastMonthOrders = DB::table('orders')
        ->whereYear('orderDate', now()->subMonth()->year)
        ->whereMonth('orderDate', now()->subMonth()->month)
        ->count();

        $finishedCount = DB::table('orders')->where('orderStatus', 'Finished')->count();
        $ongoingCount = DB::table('orders')->where('orderStatus', 'Ongoing')->count();
        $overdueCount = DB::table('orders')->where('orderStatus', 'Overdue')->count();

        $orderTotals = [
            'totalOrders' => $totalOrders,
            'currentMonthOrders' => $currentMonthOrders,
            'lastMonthOrders' => $lastMonthOrders,
            'finishedCount' => $finishedCount,
            'ongoingCount' => $ongoingCount,
            'overdueCount' => $overdueCount,
        ];

        return $orderTotals;
    }
    public function chart()
{
    date_default_timezone_set('Asia/Jakarta');
    $currentMonth = Carbon::now()->startOfMonth();
    $nextMonth = Carbon::now()->startOfMonth()->addMonth();

    $data = DB::table('orders')
        ->where('orderDate', '>=', $currentMonth)
        ->where('orderDate', '<', $nextMonth)
        ->selectRaw('DATE(orderDate) as orderDay, SUM(nominalOrder) as totalNominalOrder')
        ->groupBy('orderDay')
        ->orderBy('orderDay')
        ->get();

    $labels = [];
    $values = [];

    // Generate labels and values for each day in the current month
    $startDate = $currentMonth->copy();
    $endDate = Carbon::now()->endOfDay(); // Set end date to the current day

    while ($startDate->lte($endDate)) {
        $labels[] = $startDate->format('j');
        $values[] = 0; // Set initial value to 0 for each day

        $startDate->addDay();
    }

    // Update values based on the data from the orders
    foreach ($data as $item) {
        $orderDay = Carbon::parse($item->orderDay);
        $dayIndex = $orderDay->diffInDays($currentMonth);
        $values[$dayIndex] = $item->totalNominalOrder;
    }

    return [
        'labels' => $labels,
        'values' => $values,
    ];
>>>>>>> 70ecb55 (update dashboard)
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

    return $orderTotals;
    }
}
