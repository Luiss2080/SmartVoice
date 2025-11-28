<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campanas')->insert([
            [
                'nombre' => 'Campaña de Verano',
                'descripcion' => 'Promociones para la temporada de verano.',
                'categoria' => 'Promoción',
                'activa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bienvenida Clientes',
                'descripcion' => 'Mensajes de bienvenida para nuevos usuarios.',
                'categoria' => 'Institucional',
                'activa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ofertas Black Friday',
                'descripcion' => 'Descuentos especiales por tiempo limitado.',
                'categoria' => 'Ventas',
                'activa' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Música Ambiental',
                'descripcion' => 'Playlist suave para fondo de tienda.',
                'categoria' => 'Ambiente',
                'activa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Avisos de Cierre',
                'descripcion' => 'Audios para anunciar el cierre del local.',
                'categoria' => 'Operativo',
                'activa' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
