<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Availability;
use Carbon\Carbon;

class DeactivateAvailabilities extends Command
{
    protected $signature = 'availabilities:deactivate';
    protected $description = 'Remove disponibilidades passadas automaticamente';

    public function handle()
    {
        \App\Models\Appointment::whereIn('availability_id', function ($query) {
            $query->select('id')->from('availabilities')->where('date', '<', now());
        })->delete();

        $deleted = \App\Models\Availability::where('date', '<', now())->delete();

        $this->info("$deleted disponibilidades passadas foram removidas com sucesso!");
    }
}
