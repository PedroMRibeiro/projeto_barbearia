<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Barber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Pedro',
            'email' => 'pedro@mail.pt',
            'password' => Hash::make('12345678'),
        ]);

        Service::insert([
            [
                'name' => 'Barba completa',
                'price' => 10.00,
            ],[
                'name' => 'Corte cabelo',
                'price' => 12.00,
            ],[
                'name' => 'Corte com desenhos',
                'price' => 14.00,
            ],[
                'name' => 'Cabelo + Barba',
                'price' => 17.00,
            ],[
                'name' => 'Cabelo + Barba + Sobrancelha',
                'price' => 20.00,
            ],[
                'name' => 'Rapar cabelo com máquina',
                'price' => 8.00,
            ],[
                'name' => 'Rapar cabelo + Barba',
                'price' => 12.00,
            ],[
                'name' => 'Sobrancelhas',
                'price' => 3.00,
            ]
        ]);

        Barber::insert([
            [
                'name' => 'Henrique',
            ],
            [
                'name' => 'Matos',
            ]
        ]);

        $this->call([
            BarberScheduleSeeder::class, // Calls the BarberScheduleSeeder
        ]);
    }
}
