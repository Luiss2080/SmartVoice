<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asumiendo que las campañas tienen IDs 1 a 5
        DB::table('audios')->insert([
            [
                'campana_id' => 1,
                'nombre' => 'Promo 2x1',
                'descripcion' => 'Audio principal de la promo de verano.',
                'archivo_path' => 'audios/promo_2x1.mp3',
                'duracion' => '00:00:30',
                'tamano' => '2.5 MB',
                'formato' => 'mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campana_id' => 1,
                'nombre' => 'Descuento Helados',
                'descripcion' => 'Spot de radio para helados.',
                'archivo_path' => 'audios/helados.wav',
                'duracion' => '00:00:15',
                'tamano' => '5.0 MB',
                'formato' => 'wav',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campana_id' => 2,
                'nombre' => 'Bienvenida General',
                'descripcion' => 'Hola y bienvenidos a nuestra tienda.',
                'archivo_path' => 'audios/bienvenida.mp3',
                'duracion' => '00:00:10',
                'tamano' => '1.0 MB',
                'formato' => 'mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'campana_id' => 4,
                'nombre' => 'Jazz Suave',
                'descripcion' => 'Música de fondo relajante.',
                'archivo_path' => 'audios/jazz.mp3',
                'duracion' => '00:03:45',
                'tamano' => '8.0 MB',
                'formato' => 'mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
