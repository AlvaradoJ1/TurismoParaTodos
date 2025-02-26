<?php

namespace Database\Seeders;

use App\Models\Transporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransporteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Transporte::create([
            'nombre' => 'Taxi: Líneas Timanco',
            'slogan' => json_encode([
                'es' => 'Más que un servicio de transporte, un compromiso con tu comodidad y confianza en cada kilómetro.',
                'en' => 'More than a transportation service, a commitment to your comfort and confidence in every kilometer.',
            ], JSON_UNESCAPED_UNICODE),
            'icono' => '🚕',
            'servicio' => json_encode([
                'es' => 'Servicio 24/7
                San Agustin - Huila',
                'en' => '24/7 Service
                San Agustin - Huila',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'descripcion' => json_encode([
                'es' => 'Servicio 24/7
                Correo: lineastimanco@hotmail.com
                Teléfono: +57 320 4353737',
                'en' => '24/7 Service
                Email: lineastimanco@hotmail.com
                Phone: +57 320 4353737',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'departamento' => 'Huila',
            'ciudad' => 'Pitalito',
            'direccion' => '',
            'img' => json_encode([
                '0' => 'p_tt_1.png',
                '1' => 'p_tt_2.png',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
        ]);
        
        //2
        Transporte::create([
            'nombre' => 'Camionetas: Cootrashuila',
            'slogan' => json_encode([
                'es' => 'Llegamos lejos contigo, conectando cada destino.',
                'en' => 'We go far with you, connecting each destination.',
            ], JSON_UNESCAPED_UNICODE),
            'icono' => '🛻',
            'servicio' => json_encode([
                'es' => 'Lunes a Viernes 
                7:00 a.m. - 12:00 p.m. 
                2:00 p.m. - 6:00 p.m.
                San Agustin - Huila',
                'en' => 'Monday to Friday 
                7:00 a.m. - 12:00 p.m. 
                2:00 p.m. - 6:00 p.m.
                San Agustin - Huila',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen

            'descripcion' => json_encode([
                'es' => 'Lunes a Viernes 
                7:00 a.m. - 12:00 p.m. 
                2:00 p.m. - 6:00 p.m.
                Correo: clientes@cootranshuila.com
                Teléfono: (8) 836 0204',
                'en' => 'Monday to Friday 
                7:00 a.m. - 12:00 p.m. 
                2:00 p.m. - 6:00 p.m.
                Email: clientes@cootranshuila.com
                Phone: (8) 836 0204',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'departamento' => 'Huila',
            'ciudad' => 'San Agustin',
            'direccion' => '',
            'img' => json_encode([
                '0' => 's_cc_1.png',
                '1' => 's_cc_2.png',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
        ]);

    }
}
