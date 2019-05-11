<?php

namespace App\Console;

use App\Models\Order;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

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
        // $schedule->command('inspire')
        //          ->hourly();


        // crontab -e
        // * * * * * docker exec -it php php /data/www/youyu/artisan schedule:run >> /dev/null 2>&1

        // 每分钟执行一次
        $schedule->call(function () {
            // 关闭10分钟未付款订单
            DB::update("UPDATE `orders` SET `status`='2'  WHERE (`created_at` < DATE_ADD(NOW(), INTERVAL -10 MINUTE) AND `status` = 1);");
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
