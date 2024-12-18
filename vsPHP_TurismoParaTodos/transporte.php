<?php
require 'cabecera.php';
// Definir las traducciones en un arreglo asociativo
$translations = [
    'es' => [
        'logo'=>'Transporte',
        'buscador'=>'Buscar lugares (ej: Pitalito)',
        'taxi-timanco'=>'Taxi: <strong>Líneas Timanco</strong>',
        'taxi-timanco-info'=>'<strong>Servicio 24/7</strong><br>
            Correo: lineastimanco@hotmail.com
            <br>Teléfono: +57 320 4353737
            <br>
            <br>“Más que un servicio de transporte, un compromiso con tu comodidad y confianza en cada kilómetro”',
        'cootranshuila'=>'Camionetas<strong>Cootrashuila</strong>',
        'cootranshuila-info'=>'Horario de atención: Lunes a Viernes 7:00 a.m. - 12:00 p.m. 2:00 p.m. - 6:00 p.m.
            <br>Correo: clientes@cootranshuila.com
            <br>Teléfono: (8) 836 0204
            <br>
            <br>“Llegamos lejos contigo, conectando cada destino”',
      

    ],
    'en' => [
        'logo'=>'Transportation',
        'buscador'=>'Search for places (eg: Pitalito)',
        'taxi-timanco'=>'Taxi: <strong>Timanco Lines</strong>',
        'taxi-timanco-info'=>'<strong>24/7 Service</strong><br>
            Email: lineastimanco@hotmail.com
            <br>Phone: +57 320 4353737
            <br>
            <br>“More than a transportation service, a commitment to your comfort and confidence in every kilometer”',
        'cootranshuila'=>'Cootrashuila Trucks</strong>',
        'cootranshuila-info'=>'Hours of operation: Monday to Friday 7:00 a.m. - 12:00 p.m. 2:00 p.m. - 6:00 p.m.
            <br>Email: clientes@cootranshuila.com
            <br>Phone: (8) 836 0204
            <br>
            <br>“We go far with you, connecting each destination”',

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
    <section class="sitio" data-lugar="Pitalito">
        <h2><?php echo $text['taxi-timanco']; ?></h2>
        <div class="transporte-container">
            <!-- Imagen principal a la izquierda -->
            <div class="imagen-izquierda">
                <img src="img/p_tt_1.png" alt="Taxi Líneas Timanco">
            </div>
            <!-- Contenedor con imagen secundaria y texto -->
            <div class="info-derecha">
                <img src="img/p_tt_2.png" alt="Flota de Taxis">
                <div class="info-texto">
                    <p><?php echo $text['taxi-timanco-info']; ?></p>
                    <button class="ver-detalles">Ver detalles</button>
                </div>
            </div>
        </div>
    </section>
    <section class="sitio" data-lugar="San Agustín">
        <h2><?php echo $text['cootranshuila']; ?></h2>
        <div class="transporte-container">
            <!-- Imagen principal a la izquierda -->
            <div class="imagen-izquierda">
                <img src="img/s_cc_1.png" alt="Camioneta">
            </div>
            <!-- Contenedor con imagen secundaria y texto -->
            <div class="info-derecha">
                <img src="img/s_cc_2.png" alt="Camioneta">
                <div class="info-texto">
                    <p><?php echo $text['cootranshuila-info']; ?></p>
                    <button class="ver-detalles">Ver detalles</button>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript para el buscador -->
    <script src="js/script.js"></script>
</body>

</html>