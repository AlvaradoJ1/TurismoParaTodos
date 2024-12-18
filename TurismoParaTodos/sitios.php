<?php
require 'cabecera.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo para Todos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Buscador -->
    <div class="buscador">
        <input type="text" id="buscador" placeholder="Buscar lugares (ej: Pitalito)">
    </div>

    <!-- Lista de sitios -->
    <div class="sitios-container">
        <!-- Mirador Del Cafetal Pitalito -->
        <section class="sitio" data-lugar="Pitalito">
            <h2>Mirador Del Cafetal Pitalito</h2>
            <p>Somos una colección de momentos mágicos, paisajes sorprendentes y servicios únicos.<br>Con la mejor vista
                en Pitalito-Huila.</p>
            <div class="imagenes-container">
                <img src="img/p_miradorDelCielo_1.png" alt="Mirador del Cafetal - Vista 1">
                <img src="img/p_miradorDelCielo_2.png" alt="Mirador del Cafetal - Vista 2">
            </div>
            <p>Servicio de Lunes a Domingo 3:00pm - 11:00pm
                <br>Teléfono: +57 3122849664
                <br>
                <br>Para obtener mas informacion de promociones, eventos o reservaciones
            </p>
            <div class="contactos">
                <a href="https://wa.me/573122849664">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Como Caído del Cielo -->
        <section class="sitio" data-lugar="Pitalito">
            <h2>Como Caído del Cielo</h2>
            <p>El destino perfecto para disfrutar de buena música y la mejor gastronomía del sur del Huila.</p>
            <div class="imagenes-container">
                <img src="img/p_ccdc_1.png" alt="Como Caído del Cielo - Vista 1">
                <img src="img/p_ccdc_2.png" alt="Como Caído del Cielo - Vista 2">
            </div>
            <p>Servicio de Lunes a Domingo 4:00pm - 10:00pm
                <br>Cra 4 #27-55, Pitalito, Huila
                <br>Teléfono: +57 3214701967
                <br>
                <br>Para obtener mas informacion de promociones, eventos o reservaciones
            </p>
            <div class="contactos">
                <a href="https://wa.me/573214701967">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Sitio 1: Parque Natural El Encanto -->
        <section class="sitio" data-lugar="San Agustín">
            <h2>Parque Natural El Encanto</h2>
            <p>Un paraíso ecológico donde la naturaleza y la tranquilidad se unen para ofrecerte una experiencia
                inolvidable.</p>
            <div class="imagenes-container">
                <img src="img/sa_pn_1.png" alt="Parque Natural El Encanto - Vista 1">
                <img src="img/sa_pn_2.png" alt="Parque Natural El Encanto - Vista 2">
            </div>
            <p>Servicio de Lunes a Domingo 8:00am - 5:00pm
                <br>Vereda El Encanto, San Agustín, Huila
                <br>Teléfono: +57 3134567890
                <br>
                <br>Para obtener mas informacion de promociones, eventos o reservaciones
            </p>
            <div class="contactos">
                <a href="https://wa.me/573134567890">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Sitio 2: Cascadas del Mortiño -->
        <section class="sitio" data-lugar="Timaná">
            <h2>Cascadas del Mortiño</h2>
            <p>Descubre las impresionantes caídas de agua rodeadas de una flora exuberante, ideal para la aventura y el
                descanso.</p>
            <div class="imagenes-container">
                <img src="img/t_cdm.jpg" alt="Cascadas del Mortiño - Vista 1">
                <img src="img/t_cdm_2.jpg" alt="Cascadas del Mortiño - Vista 2">
            </div>
            <p>Servicio de Lunes a Domingo 9:00am - 6:00pm
                <br>Ruta 45, Km 5, Timaná, Huila
                <br>Teléfono: +57 3209876543
                <br>
                <br>Para obtener mas informacion de promociones, eventos o reservaciones
            </p>
            <div class="contactos">
                <a href="https://wa.me/573209876543">WhatsApp</a>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </section>

        <!-- Sitio 3: Termales de Rivera -->
        <section class="sitio" data-lugar="Rivera">
            <h2>Termales de Rivera</h2>
            <p>Relájate en las aguas termales naturales, conocidas por sus propiedades terapjate en las aguas termales
                naturales, conocidas por sus propiedades terapeuticas y la belleza del entorno.</p>
            <div class="imagenes-container">
                <img src="img/r_tdr_1.jpg" alt="Termales de Rivera - Vista 1">
                <img src="img/r_tdr_2.jpg" alt="Termales de Rivera - Vista 2">
            </div>
            <p>Servicio de Lunes a Domingo 7:00am - 9:00pm
                <br>Calle Principal, Rivera, Huila
                <br>Teléfono: +57 3011234567
                <br>
                <br>Para obtener mas informacion de promociones, eventos o reservaciones
            </p>
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