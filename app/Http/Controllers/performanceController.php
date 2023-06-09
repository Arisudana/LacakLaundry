<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class performanceController extends Controller
{

    public function viewPerformance()
    {
        $totalOrdersMonthly = $this->totalOrdersMonthly();
        $averageOrdersPerDayMonthly = $this->averageOrdersPerDayMonthly();
        $averageRevenuePerDayMonthly = $this->averageRevenuePerDayMonthly();
        $averageLaundryTime = $this->averageLaundryTime();
        $mostOrdersDay = $this->mostOrdersDay();

        $chartData = $this->chart();
        $labels = $chartData['labels'];
        $values = $chartData['values'];
        $previousMonthValues = $chartData['previousMonthValues'];

        $totalRevenue = $this->totalRevenue();
        $currentMonthRevenue = $this->currentMonthRevenue();
        $lastMonthRevenue = $this->lastMonthRevenue();

        return view('performance')->with(compact('labels', 'values', 'previousMonthValues', 'totalOrdersMonthly', 'averageOrdersPerDayMonthly', 'totalRevenue', 'currentMonthRevenue', 'lastMonthRevenue', 'averageRevenuePerDayMonthly', 'averageLaundryTime', 'mostOrdersDay'));
    }

    public function chart()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentMonth = Carbon::now()->startOfMonth();
        $previousMonth = Carbon::now()->startOfMonth()->subMonth(); // Get the start of the previous month

        // Retrieve data for the current month
        $currentMonthData = DB::table('orders')
            ->where('orderDate', '>=', $currentMonth)
            ->where('orderDate', '<', $currentMonth->copy()->addMonth())
            ->selectRaw('DATE(orderDate) as orderDay, SUM(nominalOrder) as totalNominalOrder')
            ->groupBy('orderDay')
            ->orderBy('orderDay')
            ->get();

        // Retrieve data for the previous month
        $previousMonthData = DB::table('orders')
            ->where('orderDate', '>=', $previousMonth)
            ->where('orderDate', '<', $previousMonth->copy()->addMonth())
            ->selectRaw('DATE(orderDate) as orderDay, SUM(nominalOrder) as totalNominalOrder')
            ->groupBy('orderDay')
            ->orderBy('orderDay')
            ->get();

        $labels = [];
        $values = [];
        $previousMonthValues = [];

        $startDate = $currentMonth->copy();
        $endDate = $currentMonth->copy()->endOfMonth();

        while ($startDate->lte($endDate)) {
            $labels[] = $startDate->format('j');
            $values[] = 0;
            $previousMonthValues[] = 0;

            $startDate->addDay();
        }

        // Update values based on the data from the current month's orders
        foreach ($currentMonthData as $item) {
            $orderDay = Carbon::parse($item->orderDay);
            $dayIndex = $orderDay->diffInDays($currentMonth);
            $values[$dayIndex] = $item->totalNominalOrder;
        }

        // Update values based on the data from the previous month's orders
        foreach ($previousMonthData as $item) {
            $orderDay = Carbon::parse($item->orderDay);
            $dayIndex = $orderDay->diffInDays($previousMonth);
            $previousMonthValues[$dayIndex] = $item->totalNominalOrder;
        }

        return [
            'labels' => $labels,
            'values' => $values,
            'previousMonthValues' => $previousMonthValues,
        ];
    }

    public function totalOrdersMonthly()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentMonth = Carbon::now()->format('Y-m');

        $totalOrdersMonthly = DB::connection('mysql')
            ->table('orders')
            ->where('orderDate', 'like', $currentMonth . '%')
            ->count();

        return $totalOrdersMonthly;
    }

    public function averageOrdersPerDayMonthly()
    {
        date_default_timezone_set('Asia/Jakarta');
        $totalOrdersMonthly = $this->totalOrdersMonthly();
        $currentDay = Carbon::now()->day;

        $averageOrdersPerDayMonthly = round(($totalOrdersMonthly / $currentDay), 1);

        return $averageOrdersPerDayMonthly;
    }

    public function averageRevenuePerDayMonthly()
    {
        $currentMonthRevenue = $this->currentMonthRevenue();
        $currentDay = Carbon::now()->day;

        $averageRevenuePerDayMonthly = round(($currentMonthRevenue / $currentDay), 0);

        return $averageRevenuePerDayMonthly;
    }

    public function totalRevenue()
    {
        date_default_timezone_set('Asia/Jakarta');
        $totalRevenue = DB::connection('mysql')
            ->table('orders')
            ->sum('nominalOrder');

        return $totalRevenue;
    }

    public function currentMonthRevenue()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentMonth = Carbon::now()->format('Y-m');
        $currentMonthRevenue = DB::connection('mysql')
            ->table('orders')
            ->where('orderDate', 'like', $currentMonth . '%')
            ->sum('nominalOrder');

        return $currentMonthRevenue;
    }

    public function lastMonthRevenue()
    {
        date_default_timezone_set('Asia/Jakarta');
        $lastMonthRevenue = DB::table('orders')
            ->whereYear('orderDate', now()->subMonth()->year)
            ->whereMonth('orderDate', now()->subMonth()->month)
            ->sum('nominalOrder');

        return $lastMonthRevenue;
    }

    public function averageLaundryTime()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $averageTimeDifference = DB::table('orders')
            ->selectRaw('AVG(TIMESTAMPDIFF(DAY, orderDate, dateReady)) as avg_days, AVG(TIMESTAMPDIFF(HOUR, orderDate, dateReady)) as avg_hours')
            ->where('orderDate', 'like', $currentMonth . '%')
            ->first();

        $averageDays = floor($averageTimeDifference->avg_days);
        $averageHours = $averageTimeDifference->avg_hours % 24;

        $averageLaundryTime = "{$averageDays}d {$averageHours}h";

        return $averageLaundryTime;
    }

    public function mostOrdersDay()
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentMonth = Carbon::now()->format('Y-m');

        $mostOrdersDay = DB::table('orders')
        ->select(DB::raw('DATE(orderDate) as order_day'), DB::raw('COUNT(*) as order_count'))
        ->where('orderDate', 'LIKE', $currentMonth.'%')
        ->groupBy('order_day')
        ->orderByDesc('order_count')
        ->first();

    return $mostOrdersDay->order_count ?? 0;
}

}
