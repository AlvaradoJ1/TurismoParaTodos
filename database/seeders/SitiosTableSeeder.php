<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sitio;

class SitiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Sitio::create([
            'nombre' => 'Mirador Del Cafetal',
            'slogan' => json_encode([
                'es' => 'Somos una colección de momentos mágicos, paisajes sorprendentes y servicios únicos.',
                'en' => 'We are a collection of magical moments, amazing landscapes and unique services.',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                3:00pm - 11:00pm
                Pitalito - Huila',
                'en' => 'Service Monday to Sunday 
                3:00pm - 11:00pm
                Pitalito - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                3:00pm - 11:00pm
            Teléfono: +57 3122849664
            
            Para obtener mas informacion de promociones, eventos o reservaciones',
                'en' => 'Service Monday to Sunday 
                3:00pm - 11:00pm
                Phone: +57 3122849664
                
                For more information on promotions, events or reservations',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'departamento' => 'Huila',
            'ciudad' => 'Pitalito',
            'direccion' => '',
            'img' => json_encode([
                '0' => 'p_miradorDelCielo_1.png',
                '1' => 'p_miradorDelCielo_2.png',
                '2' => 'p_miradorDelCielo_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);

        //2
        Sitio::create([
            'nombre' => 'Como Caído del Cielo',
            'slogan' => json_encode([
                'es' => 'El destino perfecto para disfrutar de buena música y la mejor gastronomía del sur del Huila.',
                'en' => 'The perfect destination to enjoy good music and the best cuisine in southern Huila.',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                4:00 pm - 10:00 pm
                Pitalito - Huila',
                'en' => 'Service from Monday to Sunday 
                4:00 pm - 10:00 pm
                Pitalito - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                4:00pm - 10:00pm
                Cra 4 #27-55, Pitalito, Huila
                Teléfono: +57 3214701967
            
                Para obtener mas informacion de promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                4:00 p.m. - 10:00 p.m.
                Cra 4 # 27-55, Pitalito, Huila
                Phone: +57 3214701967
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'departamento' => 'Huila',
            'ciudad' => 'Pitalito',
            'direccion' => 'Cra 4 #27-55',
            'img' => json_encode([
                '0' => 'p_ccdc_1.png',
                '1' => 'p_ccdc_2.jpg',
                '2' => 'p_ccdc_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);

        //3
        Sitio::create([
            'nombre' => 'Parque Natural El Encanto',
            'slogan' => json_encode([
                'es' => 'Un paraíso ecológico donde la naturaleza y la tranquilidad se unen para ofrecerte una experiencia inolvidable.',
                'en' => 'An ecological paradise where nature and tranquility come together to offer you an unforgettable experience.',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                8:00am - 5:00pm
                San Agustín - Huila',
                'en' => 'Service from Monday to Sunday 
                8:00 a.m. - 5:00 p.m.
                San Agustín - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                8:00am - 5:00pm
            Vereda El Encanto, San Agustín, Huila
            Teléfono: +57 3134567890
            
            Para obtener mas informacion de promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                8:00 a.m. - 5:00 p.m.
                Vereda El Encanto, San Agustín, Huila
                Phone: +57 3134567890
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'departamento' => 'Huila',
            'ciudad' => 'San Agustin',
            'direccion' => '',
            'img' => json_encode([
                '0' => 'sa_pn_1.png',
                '1' => 'sa_pn_2.png',
                '2' => 'sa_pn_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);

        //4
        Sitio::create([
            'nombre' => 'Cascadas del Mortiño',
            'slogan' => json_encode([
                'es' => 'Descubre las impresionantes caídas de agua rodeadas de una flora exuberante, ideal para la aventura y el descanso.',
                'en' => 'Discover the impressive waterfalls surrounded by lush flora, ideal for adventure and relaxation.',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                9:00am - 6:00pm
                Timaná - Huila',
                'en' => 'Service from Monday to Sunday 
                9:00am - 6:00pm
                Timaná - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                9:00am - 6:00pm
                Ruta 45, Km 5, Timaná, Huila
                Teléfono: +57 3209876543
                
                Para obtener mas informacion de promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                9:00am - 6:00pm
                Ruta 45, Km 5, Timaná, Huila
                Phone: +57 3209876543
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'departamento' => 'Huila',
            'ciudad' => 'Timaná',
            'direccion' => 'Ruta 45, Km 5',
            'img' => json_encode([
                '0' => 't_cdm.jpg',
                '1' => 't_cdm_2.jpg',
                '2' => 't_cdm_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);

        //5
        Sitio::create([
            'nombre' => 'Termales de Rivera',
            'slogan' => json_encode([
                'es' => 'Relájate en las aguas termales naturales, conocidas por sus propiedades terapjate en las aguas termales naturales, conocidas por sus propiedades terapeuticas y la belleza del entorno.',
                'en' => 'Relax in the natural hot springs, known for their therapeutic properties and the beauty of the surroundings.',
            ], JSON_UNESCAPED_UNICODE),
            'servicio' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                7:00am - 9:00pm
                Rivera - Huila',
                'en' => 'Service from Monday to Sunday 
                7:00am - 9:00pm
                Rivera - Huila',
            ], JSON_UNESCAPED_UNICODE),
            'descripcion' => json_encode([
                'es' => 'Servicio de Lunes a Domingo 
                7:00am - 9:00pm
            Calle Principal, Rivera, Huila
            Teléfono: +57 3011234567
            
            Para obtener mas informacion de promociones, eventos o reservaciones.',
                'en' => 'Service from Monday to Sunday 
                7:00am - 9:00pm
                Main Street, Rivera, Huila
                Phone: +57 3011234567
                
                For more information on promotions, events or reservations.',
            ], JSON_UNESCAPED_UNICODE), // Asegura que los caracteres especiales no se escapen
            'departamento' => 'Huila',
            'ciudad' => 'Rivera',
            'direccion' => 'Calle principal',
            'img' => json_encode([
                '0' => 'r_tdr_1.jpg',
                '1' => 'r_tdr_2.jpg',
                '2' => 'r_tdr_3.jpg',
            ], JSON_UNESCAPED_UNICODE),
            'whatsapp' => '#',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'tiktok' => '#',
        ]);
    }
}


