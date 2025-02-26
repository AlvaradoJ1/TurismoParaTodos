<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ////5
        Comentario::create([
            'sitio_id' => '1',
            'usuario_id' => '1',
            'usuario' => 'Cristobal',
            'comentario' => 'excelente servicio, buena disposicion',
        ]);
    }
}
