<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configuraciones')->insert([
            ['clave' => 'reproductor_autoplay', 'valor' => 'true', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => 'reproductor_loop', 'valor' => 'false', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => 'volumen_defecto', 'valor' => '80', 'created_at' => now(), 'updated_at' => now()],
            ['clave' => 'tema_oscuro', 'valor' => 'true', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
