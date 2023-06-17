<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Carbon\Carbon;


class ordersController1 extends Controller
{
    public function viewOngoingProgress()
    {
        $orders = DB::table('orders')
        ->where('orderStatus','Ongoing')
        ->paginate(10);
        // $condition= DB::table('orders')->select('orderType')->get();
        return view('ongoing', ['orders' => $orders]);
    }

    public function viewOverdueProgress()
    {
        $orders = DB::table('orders')
        ->where('orderStatus','Overdue')
        ->paginate(10);
        // $condition= DB::table('orders')->select('orderType')->get();
        return view('overdue', ['orders' => $orders]);
    }

    public function viewFinished()
    {
        $orders = DB::table('orders')
        ->where('orderStatus','Finished')
        ->paginate(10);
        // $condition= DB::table('orders')->select('orderType')->get();
        return view('finished', ['orders' => $orders]);
    }

    public function storeOngoingWashed(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $idValue = $request->input('idValue');
        DB::table('orders')->where('id', $idValue)
        ->update(['dateWashed'=>Carbon::now()]);

        return redirect('/ongoing');
    }

    public function storeOngoingIroned(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $idValue = $request->input('idValue');
        DB::table('orders')->where('id', $idValue)
        ->update(['dateIroned'=>Carbon::now()]);

        return redirect('/ongoing');
    }

    public function storeOngoingReady(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $idValue = $request->input('idValue');
        DB::table('orders')->where('id', $idValue)
        ->update(['dateReady'=>Carbon::now(),
        'orderStatus'=>'Finished']);

        return redirect('/ongoing');
    }


    public function storeOverdueWashed(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $idValue = $request->input('idValue');
        DB::table('orders')->where('id', $idValue)
        ->update(['dateWashed'=>Carbon::now()]);

        return redirect('/overdue');
    }

    public function storeOverdueIroned(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $idValue = $request->input('idValue');
        DB::table('orders')->where('id', $idValue)
        ->update(['dateIroned'=>Carbon::now()]);

        return redirect('/overdue');
    }

    public function storeOverdueReady(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $idValue = $request->input('idValue');
        DB::table('orders')->where('id', $idValue)
        ->update(['dateReady'=>Carbon::now(),
        'orderStatus'=>'Finished']);


        return redirect('/overdue');
    }
}
