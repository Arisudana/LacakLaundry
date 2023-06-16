<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function viewOrder()
    {
        $latestOngoingOrders = Order::where('orderStatus', 'Ongoing')
            ->latest('orderDate')
            ->take(2)
            ->get();

        $latestOverdueOrders = Order::where('orderStatus', 'Overdue')
            ->latest('orderDate')
            ->take(2)
            ->get();

        $latestFinishedOrders = Order::where('orderStatus', 'Finished')
            ->latest('orderDate')
            ->take(2)
            ->get();

        return view('viewOrder', compact('latestOngoingOrders', 'latestOverdueOrders', 'latestFinishedOrders'));
    }

}
