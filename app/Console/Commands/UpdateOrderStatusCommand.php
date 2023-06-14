<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateOrderStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order-status:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the order status if conditions are met';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Jakarta');
        while (true) {
            $overdueTimeValue = DB::connection('mysql')
                ->table('order_settings')
                ->where('id', 1)
                ->value('value');

            $ordersToUpdate = Order::where('orderStatus', 'Ongoing')
                ->whereNull('dateReady')
                ->get();

            foreach ($ordersToUpdate as $order) {
                $orderDate = Carbon::parse($order->orderDate);
                $currentDate = Carbon::now();
                $daysDifference = $currentDate->diffInDays($orderDate);

                if ($daysDifference >= $overdueTimeValue) {
                    $order->orderStatus = 'Overdue';
                    $order->save();
                }
            }

            sleep(10);
        }
    }
}
