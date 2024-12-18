<?php
require 'cabecera.php';
// Definir las traducciones en un arreglo asociativo
$translations = [
    'es' => [
        'logo'=>'Sitios',
        'buscador'=>'Buscar lugares (ej: Pitalito)',
        'mirador-cafetal'=>'Mirador Del Cafetal Pitalito',
        'mirador-cafetal-slogan'=>'Somos una colección de momentos mágicos, paisajes sorprendentes y servicios únicos.
            <br>Con la mejor vista en Pitalito-Huila.',
        'mirador-cafetal-info'=>'Servicio de Lunes a Domingo 3:00pm - 11:00pm
            <br>Teléfono: +57 3122849664
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones',
        'caido-cielo'=>'Como Caído del Cielo',
        'caido-cielo-slogan'=>'El destino perfecto para disfrutar de buena música y la mejor gastronomía del sur del Huila.',
        'caido-cielo-info'=>'Servicio de Lunes a Domingo 4:00pm - 10:00pm
            <br>Cra 4 #27-55, Pitalito, Huila
            <br>Teléfono: +57 3214701967
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones.',
        'parque-encanto'=>'Parque Natural El Encanto',
        'parque-encanto-slogan'=>'Un paraíso ecológico donde la naturaleza y la tranquilidad se unen para ofrecerte una experiencia inolvidable.',
        'parque-encanto-info'=>'Servicio de Lunes a Domingo 8:00am - 5:00pm
            <br>Vereda El Encanto, San Agustín, Huila
            <br>Teléfono: +57 3134567890
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones',
        'cascada-mortiño'=>'Cascadas del Mortiño',
        'cascada-mortiño-slogan'=>'Descubre las impresionantes caídas de agua rodeadas de una flora exuberante, ideal para la aventura y el descanso.',
        'cascada-mortiño-info'=>'Servicio de Lunes a Domingo 9:00am - 6:00pm
            <br>Ruta 45, Km 5, Timaná, Huila
            <br>Teléfono: +57 3209876543
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones',
        'termales-rivera'=>'Termales de Rivera',
        'termales-rivera-slogan'=>'Relájate en las aguas termales naturales, conocidas por sus propiedades terapjate en las aguas termales naturales, conocidas por sus propiedades terapeuticas y la belleza del entorno.',
        'termales-rivera-info'=>'Servicio de Lunes a Domingo 7:00am - 9:00pm
            <br>Calle Principal, Rivera, Huila
            <br>Teléfono: +57 3011234567
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones',
    ],
    'en' => [
        'logo'=>'sites',
        'buscador'=>'Search places (eg: Pitalito)',
        'mirador-cafetal'=>'Mirador Del Cafetal Pitalito',
        'mirador-cafetal-slogan'=>'We are a collection of magical moments, amazing landscapes and unique services.<br>With the best view of Pitalito-Huila.',
        'mirador-cafetal-info'=>'Service Monday to Sunday 3:00pm - 11:00pm
            <br>Phone: +57 3122849664
            <br>
            <br>For more information on promotions, events or reservations.',
        'caido-cielo'=>'Como Caído del Cielo',
        'caido-cielo-slogan'=>'The perfect destination to enjoy good music and the best cuisine in southern Huila.',
        'caido-cielo-info'=>'Service from Monday to Sunday 4:00 p.m. - 10:00 p.m.
            <br> Cra 4 # 27-55, Pitalito, Huila
            <br> Phone: +57 3214701967
            <br>
            <br>For more information on promotions, events or reservations.',
        'parque-encanto'=>'Parque Natural El Encanto',
        'parque-encanto-slogan'=>'An ecological paradise where nature and tranquility come together to offer you an unforgettable experience.',
        'parque-encanto-info'=>'Service from Monday to Sunday 8:00 a.m. - 5:00 p.m.
            <br>Vereda El Encanto, San Agustín, Huila
            <br> Phone: +57 3134567890
            <br>
            <br>For more information on promotions, events or reservations.',
        'cascada-mortiño'=>'Cascadas del Mortiño',
        'cascada-mortiño-slogan'=>'Discover the impressive waterfalls surrounded by lush flora, ideal for adventure and relaxation.',
        'cascada-mortiño-info'=>'Service from Monday to Sunday 9:00am - 6:00pm
            <br>Route 45, Km 5, Timaná, Huila
            <br>Phone: +57 3209876543
            <br>
            <br>For more information on promotions, events or reservations.',
        'termales-rivera'=>'Termales de Rivera',
        'termales-rivera-slogan'=>'Relax in the natural hot springs, known for their therapeutic properties and the beauty of the surroundings.',
        'termales-rivera-info'=>'Service from Monday to Sunday 7:00am - 9:00pm
            <br>Main Street, Rivera, Huila
            <br>Phone: +57 3011234567
            <br>
            <br>For more information on promotions, events or reservations.',
    ],
];
// Obtener el idioma desde la URL (por defecto es español)
$lang = isset($_GET['lang']) && array_key_exists($_GET['lang'], $translations) ? $_GET['lang'] : 'es';
$text = $translations[$lang];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $text['logo']; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Buscador -->
    <div class="buscador">
        <input type="text" id="buscador" placeholder="<?php echo $text['buscador']?>">
    </div>

    <!-- Lista de sitios -->
    <div class="sitios-container">
        <!-- Mirador Del Cafetal Pitalito -->
        <section class="sitio" data-lugar="Pitalito">
            <h2><?php echo $text['mirador-cafetal']; ?></h2>
            <p><?php echo $text['mirador-cafetal-slogan']; ?></p>
            <div class="imagenes-container">
                <img src="img/p_miradorDelCielo_1.png" alt="Mirador del Cafetal - Vista 1">
                <img src="img/p_miradorDelCielo_2.png" alt="Mirador del Cafetal - Vista 2">
            </div>
                     <p><?php echo $text['mirador-cafetal-info']; ?></p>
            <div class="contactos">
                <a href="https://wa.me/573122849664">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Como Caído del Cielo -->
        <section class="sitio" data-lugar="Pitalito">
            <h2><?php echo $text['caido-cielo']; ?></h2>
            <p><?php echo $text['caido-cielo-slogan']; ?></p>
            <div class="imagenes-container">
                <img src="img/p_ccdc_1.png" alt="Como Caído del Cielo - Vista 1">
                <img src="img/p_ccdc_2.png" alt="Como Caído del Cielo - Vista 2">
            </div>
            <p><?php echo $text['caido-cielo-info']?></p>
            <div class="contactos">
                <a href="https://wa.me/573214701967">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Parque Natural El Encanto -->
        <section class="sitio" data-lugar="San Agustín">
            <h2><?php echo $text['parque-encanto']?></h2>
            <p><?php echo $text['parque-encanto-slogan']; ?></p>
            <div class="imagenes-container">
                <img src="img/sa_pn_1.png" alt="Parque Natural El Encanto - Vista 1">
                <img src="img/sa_pn_2.png" alt="Parque Natural El Encanto - Vista 2">
            </div>
            <p><?php echo $text['parque-encanto-info']; ?></p>
            <div class="contactos">
                <a href="https://wa.me/573134567890">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Cascadas del Mortiño -->
        <section class="sitio" data-lugar="Timaná">
            <h2><?php echo $text['cascada-mortiño']; ?></h2>
            <p><?php echo $text['cascada-mortiño-slogan']; ?></p>
            <div class="imagenes-container">
                <img src="img/t_cdm.jpg" alt="Cascadas del Mortiño - Vista 1">
                <img src="img/t_cdm_2.jpg" alt="Cascadas del Mortiño - Vista 2">
            </div>
            <p><?php echo $text['cascada-mortiño-info']; ?></p>
            <div class="contactos">
                <a href="https://wa.me/573209876543">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Termales de Rivera -->
        <section class="sitio" data-lugar="Rivera">
            <h2><?php echo $text['termales-rivera']; ?></h2>
            <p><?php echo $text['termales-rivera-slogan']; ?></p>
            <div class="imagenes-container">
                <img src="img/r_tdr_1.jpg" alt="Termales de Rivera - Vista 1">
                <img src="img/r_tdr_2.jpg" alt="Termales de Rivera - Vista 2">
            </div>
            <p><?php echo $text['termales-rivera-info']; ?></p>
            <div class="contactos">
                <a href="https://wa.me/573011234567">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>
    </div>

    <script src="js/script.js"></script>
</body>

</html>