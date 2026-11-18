<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Defina os comandos Artisan para a aplicação.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Defina o agendamento das tarefas.
     */
    protected function schedule(Schedule $schedule)
    {
        // Adicione aqui os comandos agendados
        $schedule->command('availabilities:deactivate')->everyMinute()->withoutOverlapping();
    }
}