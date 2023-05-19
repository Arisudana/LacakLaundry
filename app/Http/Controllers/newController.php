<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newController extends Controller
{
    public function newOrder(){
        return view('newOrder');
    }
    public function submitOrder(Request $orders){
        DB::table('orders')->insert([
            'customerName'=> $orders->customerName,
            'phoneNumber'=> $orders->phoneNumber,
            'orderWeight'=> $orders->orderWeight,
            'orderType'=> $orders->orderType,
            'nominalOrder'=> $orders->nominalOrder,
            'orderDate'=> now()
        ]);

        return redirect('dashboard');
    }
}
