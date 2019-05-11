<?php

namespace App\Console;

use App\Models\Order;
use App\Models\VenueTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // crontab -e
        // * * * * * docker exec -i php php /data/www/youyu/artisan schedule:run >> /data/sh/jobs-youyu.log 2>&1

        // 每分钟执行一次
        $schedule->call(function () {
            // 关闭10分钟未付款订单
            $orders = DB::select("select `id`,`venue_time_ids` from `orders` WHERE (`created_at` < DATE_ADD(NOW(), INTERVAL -10 MINUTE) AND `status` = 1)");
            foreach ($orders as $order){
                Order::where('id', $order->id)->update(['status' => 3]);
                $ids = explode(',', $order->venue_time_ids);
                foreach ($ids as $id) {
                    VenueTime::where('id', $id)->update(['status' => 1]);
                    echo sprintf("订单超时关闭:%d \n", $id);
                }
            }
            // 释放场次
        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
