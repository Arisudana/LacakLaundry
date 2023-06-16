<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class settingsOrderController extends Controller
{
    public function viewSettingsOrder()
    {
        $orderSettingsData = $this->getOrderSettingsData();
        return view('SettingsOrder')->with(compact('orderSettingsData'));
    }

    public function updateOrderSettings(Request $orderSettings){

        DB::table('order_settings')
        ->where('id',1)
        ->update(['value'=>$orderSettings->overdueTime]);

        DB::table('order_settings')
        ->where('id',2)
        ->update(['value'=>$orderSettings->cuciBasah]);

        DB::table('order_settings')
        ->where('id',3)
        ->update(['value'=>$orderSettings->cuciKering]);

        DB::table('order_settings')
        ->where('id',4)
        ->update(['value'=>$orderSettings->cuciKeringSetrika]);



        return redirect('/settings');


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
