<?php
require 'cabecera.php';
// Definir las traducciones en un arreglo asociativo
$translations = [
    'es' => [
        'logo' => 'Restaurantes',
        'buscador' => 'Buscar lugares (ej: Pitalito)',
        'portobello-restaurante' => 'Portobello Restaurante',
        'portobello-restaurante-slogan' => 'Restaurante Portobello Gastrobar Brindandote el mejor servicio y la mejor comida.',
        'portobello-restaurante-info' => 'Se requieren reservas · Ofrece comida en hora feliz · Tiene chimenea
            <br>Servicio de Lunes a Domingo 8:00am - 8:00pm
            <br>Dirección: Cra. 15 #21 - 66, Pitalito, Huila, Colombia
            <br>telefono:  +57 311 6042595
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones.',
        'meson-gourmet' => 'El Mesón GOURMET San agustín huila',
        'meson-gourmet-slogan' => 'Sabor y tradición en cada bocado, ¡una experiencia gourmet en el corazón de San Agustín!',
        'meson-gourmet-info' => 'Servicio de Lunes a Domingo 8:00am - 8:00pm
            <br>Dirección: 418060, San Agustín, Huila, Colombia
            <br>telefono: +57 310 3285323
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones.',
        'restaurante-fogon' => 'Restaurante El Fogón',
        'restaurante-fogon-slogan' => 'El sabor de la tradición en cada plato, ¡ven y disfruta del auténtico sabor huilense!',
        'restaurante-fogon-info' => 'Servicio de Lunes a Domingo 7:00am - 9:45pm
            <br>Dirección: Cl 5 #144, San Agustín, Huila, Colombia
            <br>telefono:+57 320 8345860
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones.',


    ],
    'en' => [
        'logo' => 'Restaurants',
        'buscador' => 'Search places (eg: Pitalito)',
        'portobello-restaurante' => 'Portobello Restaurant',
        'portobello-restaurante-slogan' => 'Portobello Gastrobar Restaurant Offering you the best service and the best food.',
        'portobello-restaurante-info' => 'Reservations required · Offers happy hour food · Has a fireplace
            <br>Service Monday to Sunday 8:00am - 8:00pm
            <br>Address: Cra. 15 #21 - 66, Pitalito, Huila, Colombia
            <br>Phone: +57 311 6042595
            <br>
            <br>For more information on promotions, events or reservations.',
        'meson-gourmet' => 'El Mesón GOURMET San agustín huila',
        'meson-gourmet-slogan' => 'Flavor and tradition in every bite, a gourmet experience in the heart of San Agustín!',
        'meson-gourmet-info' => 'Service Monday to Sunday 8:00am - 8:00pm
            <br>Address: 418060, San Agustín, Huila, Colombia
            <br>Phone: +57 310 3285323
            <br>
            <br>For more information on promotions, events or reservations.',
        'restaurante-fogon' => 'El Fogón Restaurant',
        'restaurante-fogon-slogan' => 'The taste of tradition in each dish, come and enjoy the authentic Huila flavor!',
        'restaurante-fogon-info' => 'Service Monday to Sunday 7:00am - 9:45pm
            <br>Address: Cl 5 #144, San Agustín, Huila, Colombia
            <br>Phone:+57 320 8345860
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
    <section class="sitio" data-lugar="Pitalito">
        <h2><?php echo $text['portobello-restaurante'] ?></h2>
        <p><?php echo $text['portobello-restaurante-slogan']; ?></p>
        <div class="imagenes-container">
            <img src="img/p_pr_1.jpg" alt=" Vista 1">
            <img src="img/p_pr_2.jpg" alt="Vista 2">
        </div>
        <p><?php echo $text['portobello-restaurante-info']; ?></p>
        <div class="contactos">
            <a href="https://wa.me/573122849664">WhatsApp</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
    <section class="sitio" data-lugar="San Agustín">
        <h2><?php echo $text['meson-gourmet']; ?></h2>
        <p><?php echo $text['meson-gourmet-slogan']; ?></p>
        <div class="imagenes-container">
            <img src="img/s_emg_1.jpg" alt=" Vista 1">
            <img src="img/s_emg_2.jpg" alt="Vista 2">
        </div>
        <p><?php echo $text['meson-gourmet-info']; ?></p>
        <div class="contactos">
            <a href="https://wa.me/573122849664">WhatsApp</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
    <section class="sitio" data-lugar="San Agustín">
    <h2><?php echo $text['restaurante-fogon']; ?></h2>
    <p><?php echo $text['restaurante-fogon-slogan']; ?></p>
        <div class="imagenes-container">
            <img src="img/s_ef_1.jpg" alt="Vista 1">
            <img src="img/s_ef_2.jpg" alt="Vista 2">
        </div>
        <p><?php echo $text['restaurante-fogon-info']; ?></p>
        <div class="contactos">
            <a href="https://wa.me/573122849664">WhatsApp</a>
            <a href="https://www.facebook.com/p/El-Fog%C3%B3n-en-San-Agust%C3%ADn-100038285031569/?_rdr">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
    <!-- JavaScript para el buscador -->
    <script src="js/script.js"></script>
</body>

</html>