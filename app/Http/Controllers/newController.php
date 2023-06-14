<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class newController extends Controller
{
    public function newOrder(){

        $orderSettingsData = $this->getOrderSettingsData();
        return view('newOrder')->with(compact('orderSettingsData'));
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

    public function getOrderSettingsData(){
        $overdueTimeValue = DB::table('order_settings')
        ->where('id',1)
        ->value('value');

        $cuciBasahValue = DB::table('order_settings')
        ->where('id',2)
        ->value('value');

        $cuciKeringValue = DB::table('order_settings')
        ->where('id',3)
        ->value('value');

        $cuciKeringSetrikaValue = DB::table('order_settings')
        ->where('id',4)
        ->value('value');

        $orderSettingsData = [
            'overdueTimeValue'=>$overdueTimeValue,
            'cuciBasahValue'=>$cuciBasahValue,
            'cuciKeringValue'=>$cuciKeringValue,
            'cuciKeringSetrikaValue'=>$cuciKeringSetrikaValue
        ];

        return $orderSettingsData;

    }
}
