<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\Mailin::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule$
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:mailin')
            ->timezone('Europe/Moscow')->daily()
            ->onSuccess(function () {
                // Задача успешно выполнена ...
            })
            ->onFailure(function () {
                // Не удалось выполнить задачу ...
            });

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
