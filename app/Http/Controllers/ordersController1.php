<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class ordersController1 extends Controller
{
    public function viewOngoingProgress()
    {
        $orders = DB::table('orders')->paginate(10);
        // $condition= DB::table('orders')->select('orderType')->get();
        return view('ongoing', ['orders' => $orders]);
    }

    public function storeDatabase()
    {

        
    }

    /*if ($jenis == 'washed'){
        DB::table('orders')->insert(['dateWashed' => Carbon::now()]);
    } elseif ($jenis == 'ironed'){
        DB::table('orders')->insert(['dateIroned' => Carbon::now()]);
    } elseif ($jenis == 'ready'){
        DB::table('orders')->insert(['dateReady' => Carbon::now()]);
    }*/

    //     // Determine the column based on the $columnID
    //     switch ($columnID) {
    //         case '1':
    //             $column = 'orderDate';
    //             break;
    //         case '2':
    //             $column = 'dateWashed';
    //             break;
    //         case '3':
    //             $column = 'dateIroned';
    //             break;
    //         case '4':
    //             $column = 'dateReady';
    //             break;
    //         default:
    //             // Handle the case where $columnID doesn't match any specific column
    //             // You can throw an exception, log an error, or handle it as per your requirements
    //             break;
    //     }

    //     if ($column !== '') {
    //         DB::table('orders')->updateOrInsert(
    //             [],
    //             [$column => $buttonTimestamp]
    //         );
    //     }

    //     return response()->json(['message' => 'Timestamp stored successfully']);
    // }


    // public function storeWash(Request $request)
    // {
    //     // $dateWashed = $request->input('dateWashed');
    //     // $datetime = Carbon::parse($dateWashed)->format('Y-m-d H:i:s');


    //     //  // Update or insert the value in the 'dateWashed' column
    //     //  DB::table('orders')->updateOrInsert([], ['dateWashed' => $dateWashed]);
    //     DB::table('orders')->insert(['dateWashed' => Carbon::now()]);
    // }

    // public function storeIron(Request $request)
    // {
    //      $dateIroned = $request->input('dateIroned');
    //      $datetime = Carbon::parse($dateIroned)->format('Y-m-d H:i:s');


    //     // Update or insert the value in the 'dateIroned' column
    //     DB::table('orders')->updateOrInsert([], ['dateIroned' => $dateIroned]);

    // }

    // public function storeReady(Request $request)
    // {
    //     $dateReady = $request->input('dateReady');
    //     $datetime = Carbon::parse($dateReady)->format('Y-m-d H:i:s');

    //      // Update or insert the value in the 'dateReady' column
    //     DB::table('orders')->updateOrInsert([], ['dateReady' => $dateReady]);

}
