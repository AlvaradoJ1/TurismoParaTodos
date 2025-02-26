<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Hotel::create([
            'nombre' => 'Hotel Escorial',
            'slogan' => json_encode([
                'es' => 'Sabor y tradición en cada bocado, ¡una experiencia gourmet en el corazón de San Agustín!',
                'en' => 'Flavor and tradition in every bite, a gourmet experience in the heart of San Agustín!',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                8:00am - 8:00pm
                Pitalito - Huila',
                'en' => 'Service from Monday to Sunday 
                8:00 a.m. - 8:00 p.m.
                Pitalito - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                8:00am - 8:00pm
                Dirección: Cra. 4 #7- 39, Pitalito, Huila, Colombia
                Teléfono: +57 320 3592452
                
                Para obtener más información sobre promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                8:00 a.m. - 8:00 p.m.
                Address: Cra. 4 #7- 39, Pitalito, Huila, Colombia
                Phone: +57 320 3592452
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE),
            'departamento' => 'Huila',
            'ciudad' => 'Pitalito',
            'direccion' => 'Cra. 4 #7- 39',
            'img' => json_encode([
                '0' => 'i_hg_1.jpg',
                '1' => 'i_hg_2.jpg',
                '2' => 'i_hg_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);

        //2
        Hotel::create([
            'nombre' => 'Mirador del Magdalena Hotel y Glamping',
            'slogan' => json_encode([
                'es' => '¿Y tú ya conoces este paraíso en el macizo colombiano?',
                'en' => 'And have you already visited this paradise in the Colombian massif?',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                8:00am - 8:00pm
                Isnos - Huila',
                'en' => 'Service from Monday to Sunday 
                8:00 a.m. - 8:00 p.m.
                Isnos - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                8:00am - 8:00pm
                Dirección: Vereda El Mortiño, Isnos, Huila
                Teléfono: +57 311 5220687
                
                Para obtener más información sobre promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                8:00 a.m. - 8:00 p.m.
                Address: Vereda El Mortiño, Isnos, Huila
                Phone: +57 311 5220687
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE),
            'departamento' => 'Huila',
            'ciudad' => 'Isnos',
            'direccion' => 'Vereda El Mortiño',
            'img' => json_encode([
                '0' => 'p_he_1.jpg',
                '1' => 'p_he_2.jpg',
                '2' => 'p_he_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);
    }
}
