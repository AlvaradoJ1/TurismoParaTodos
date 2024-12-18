<?php
require 'cabecera.php';
// Definir las traducciones en un arreglo asociativo
$translations = [
    'es' => [
        'logo'=>'Hoteles',
        'buscador'=>'Buscar lugares (ej: Pitalito)',
        'mirador-magdalena'=>'Mirador del Magdalena Hotel y Glamping',
        'mirador-magdalena-slogan'=>'¿Y tu ya conoces este paraíso en el macizo colombiano?',
        'mirador-magdalena-info'=>'Servicio de Lunes a Domingo 8:00am - 8:00pm
            <br>Dirección: Vereda el mortiño, Isnos, Huila
            <br>telefono: +57 311 5220687
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones',
        'hotel-escorial'=>'HOTEL ESCORIAL',
        'hotel-escorial-slogan'=>'Sabor y tradición en cada bocado, ¡una experiencia gourmet en el corazón de San Agustín!',
        'hotel-escorial-info'=>'Servicio de Lunes a Domingo 8:00am - 8:00pm
            <br>Cra. 4 #7- 39, Pitalito, Huila, Colombia
            <br>telefono: +57 320 3592452
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones.',


    ],
    'en' => [
        'logo'=>'Hotels',
        'buscador'=>'Search for places (eg: Pitalito)',
        'mirador-magdalena'=>'Mirador del Magdalena Hotel and Glamping',
        'mirador-magdalena-slogan'=>'And have you already visited this paradise in the Colombian massif?',
        'mirador-magdalena-info'=>'Service Monday to Sunday 8:00am - 8:00pm
            <br>Address: Vereda el mortiño, Isnos, Huila
            <br>Phone: +57 311 5220687
            <br>
            <br>For more information on promotions, events or reservations',
        'hotel-escorial'=>'HOTEL ESCORIAL',
        'hotel-escorial-slogan'=>'Flavor and tradition in every bite, a gourmet experience in the heart of San Agustín!',
        'hotel-escorial-info'=>'Service Monday to Sunday 8:00am - 8:00pm
            <br>Cra. 4 #7- 39, Pitalito, Huila, Colombia
            <br>Phone: +57 320 3592452
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
        <input type="text" id="buscador" placeholder="<?php echo $text['buscador']; ?>">
    </div>
    <section class="sitio" data-lugar="Isnos">
        <h2><?php echo $text['mirador-magdalena']; ?></h2>
        <p><?php echo $text['mirador-magdalena-slogan']; ?></p>
        <div class="imagenes-container">
            <img src="img/i_hg_1.jpg" alt=" Vista 1">
            <img src="img/i_hg_2.jpg" alt="Vista 2">
        </div>
        <p><?php echo $text['mirador-magdalena-info']; ?></p>
        <div class="contactos">
            <a href="#">WhatsApp</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
    <section class="sitio" data-lugar="Pitalito">
        <h2><?php echo $text['hotel-escorial']; ?></h2>
        <p><?php echo $text['hotel-escorial-slogan']; ?></p>
        <div class="imagenes-container">
            <img src="img/p_he_1.JPG" alt=" Vista 1">
            <img src="img/p_he_2.jpg" alt="Vista 2">
        </div>
        <p><?php echo $text['hotel-escorial-info']; ?></p>
        <div class="contactos">
            <a href="https://wa.me/573122849664">WhatsApp</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
     <!-- JavaScript para el buscador -->
     <script src="js/script.js"></script>
</body>

</html>