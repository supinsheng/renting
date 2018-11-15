<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Model\Core;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use DB;
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
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->call(function () {
        //     $config = [
        //         'accessKeyId'    => 'LTAIZHa2BPopnEcF',
        //         'accessKeySecret' => 'smFrrx0an8tV5jvLp1sOWfMcZ8Lg1e',
        //     ];
        //     $client  = new Client($config);
        //     $sendSms = new SendSms;
            
        //     $sendSms->setSignName('短信签名');
        //     $sendSms->setTemplateCode('SMS_135430007');
        //     $sendSms->setTemplateParam(['code' => rand(100000, 999999)]);
        //     $sendSms->setOutId('demo');
        //     $data = DB::table('properties')
        //         ->leftJoin('households','households.username','properties.username')
        //         ->select('properties.username','phone','data','is_pay',DB::raw('datediff(`data`,now()) as days'))
        //         ->where([
        //             ['data','>',DB::raw('now()')],
        //             ['is_pay','0']
        //         ])->get();
        //     for($i = 0; $i < count($data);$i++){
                
        //         if($data[$i]->days < 5){
        //             $sendSms->setPhoneNumbers($data[$i]->phone);
        //             $client->execute($sendSms);
        //         }
        //     }
        // })->dailyAt('13:00');

        // 每月运行一次任务  清除旧备份；
        $schedule->command('backup:clean')->monthly();
        //每天凌晨零点运行任务  备份数据库
        $schedule->command('backup:run')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
