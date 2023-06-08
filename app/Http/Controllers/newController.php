<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class newController extends Controller
{
    public function newOrder(){
        return view('newOrder');
    }
    public function submitOrder(Request $orders){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('orders')->insert([
            'customerName'=> $orders->customerName,
            'phoneNumber'=> $orders->phoneNumber,
            'orderWeight'=> $orders->orderWeight,
            'orderType'=> $orders->orderType,
            'nominalOrder'=> $orders->nominalOrder,
            'orderDate'=> Carbon::now(),
            'orderStatus' => 'Ongoing'
        ]);

        return redirect('/');
    }
}
