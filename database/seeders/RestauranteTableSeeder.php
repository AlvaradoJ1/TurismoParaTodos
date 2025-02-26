<?php

namespace Database\Seeders;

use App\Models\Restaurante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RestauranteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Restaurante::create([
            'nombre' => 'Portobello Restaurante',
            'slogan' => json_encode([
                'es' => 'Restaurante Portobello Gastrobar Brindandote el mejor servicio y la mejor comida.',
                'en' => 'Portobello Gastrobar Restaurant Offering you the best service and the best food.',
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
                Dirección: Cra. 15 #21 - 66, Pitalito, Huila
                Teléfono: +57 311 6042595
                
                Para obtener más información sobre promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                8:00 a.m. - 8:00 p.m.
                Address: Cra. 15 #21 - 66, Pitalito, Huila
                Phone: +57 311 6042595
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE),
            'departamento' => 'Huila',
            'ciudad' => 'Pitalito',
            'direccion' => 'Cra. 15 #21 - 66',
            'img' => json_encode([
                '0' => 'p_pr_1.jpg',
                '1' => 'p_pr_2.jpg',
                '2' => 'p_pr_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);

        //1
        Restaurante::create([
            'nombre' => 'Restaurante El Fogón',
            'slogan' => json_encode([
                'es' => 'El sabor de la tradición en cada plato, ¡ven y disfruta del auténtico sabor huilense!.',
                'en' => 'The taste of tradition in each dish, come and enjoy the authentic Huila flavor!.',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                7:00am - 9:45pm
                San Agustín - Huila',
                'en' => 'Service from Monday to Sunday 
                7:00 a.m. - 9:45 p.m.
                San Agustín - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                7:00am - 9:45pm
                Dirección: Cl 5 #144, San Agustín, Huila
                Teléfono: +57 320 8345860
                
                Para obtener más información sobre promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                7:00 a.m. - 9:45 p.m.
                Address: Cl 5 #144, San Agustín, Huila
                Phone: +57 320 8345860
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE),
            'departamento' => 'Huila',
            'ciudad' => 'San Agustín',
            'direccion' => 'Cl 5 #144',
            'img' => json_encode([
                '0' => 's_emg_1.jpg',
                '1' => 's_emg_2.jpg',
                '2' => 's_emg_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);
    }
}
