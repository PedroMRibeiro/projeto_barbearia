<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarberScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define a standard work schedule (Monday to Friday, 9:00 AM - 5:00 PM)
        $workingDays = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira'];
        $startTime1 = '09:00:00';
        $endTime1 = '12:30:00';
        $startTime2 = '14:00:00';
        $endTime2 = '18:00:00';

        // Get all barbers
        $barbers = DB::table('barbers')->pluck('id');

        foreach ($barbers as $barberId) {
            foreach ($workingDays as $wDay) {
                DB::table('schedules')->insert([
                    'barber_id' => $barberId,
                    'start_time' => $startTime1,
                    'end_time' => $endTime1,
                    'working_day' => $wDay,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                DB::table('schedules')->insert([
                    'barber_id' => $barberId,
                    'start_time' => $startTime2,
                    'end_time' => $endTime2,
                    'working_day' => $wDay,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}