<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@smartvoice.com'],
            [
                'name' => 'Admin SmartVoice',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'LuisRocha@gmail.com'],
            [
                'name' => 'Luis Rocha',
                'password' => Hash::make('TeAmo4'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'ArelyNuñez@gmail.com'],
            [
                'name' => 'Arely Nuñez',
                'password' => Hash::make('TeAmo4'),
            ]
        );
    }
}
