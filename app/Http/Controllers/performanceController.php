<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class performanceController extends Controller
{
    public function chart()
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $nextMonth = Carbon::now()->startOfMonth()->addMonth();

        $data = DB::table('orders')
            ->where('orderDate', '>=', $currentMonth)
            ->where('orderDate', '<', $nextMonth)
            ->selectRaw('DATE(orderDate) as orderDay, SUM(nominalOrder) as totalNominalOrder')
            ->groupBy('orderDay')
            ->get();

        $labels = [];
        $values = [];

        foreach ($data as $item) {
            $labels[] = Carbon::parse($item->orderDay)->format('M d');
            $values[] = $item->totalNominalOrder;
        }

        return view('dashboard')->with(compact('labels', 'values'));
    }
}
