<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;


class revenueDetailController extends Controller
{
    public function viewRevenueDetail(Request $request)
    {

        $rowsPerPage = ($request->input('rowsPerPage') != null) ? $request->input('rowsPerPage') : 6;
        $orders = Order::paginate($rowsPerPage);

        return view('revenueDetail', compact('orders'));
    }

}


