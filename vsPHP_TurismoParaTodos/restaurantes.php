<?php
require 'cabecera.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurantes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Buscador -->
    <div class="buscador">
        <input type="text" id="buscador" placeholder="Buscar lugares (ej: Pitalito)">
    </div>
    <section class="sitio" data-lugar="Pitalito">
        <h2>Portobello Restaurante</h2>
        <p>Restaurante Portobello Gastrobar Brindandote el mejor servicio y la mejor comida.</p>
        <div class="imagenes-container">
            <img src="img/p_pr_1.jpg" alt=" Vista 1">
            <img src="img/p_pr_2.jpg" alt="Vista 2">
        </div>
        <p>Se requieren reservas · Ofrece comida en hora feliz · Tiene chimenea
            <br>Servicio de Lunes a Domingo 8:00am - 8:00pm
            <br>Dirección: Cra. 15 #21 -66, Pitalito, Huila, Colombia
            <br>telefono:  +57 311 6042595
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones
        </p>
        <div class="contactos">
            <a href="https://wa.me/573122849664">WhatsApp</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
    <section class="sitio" data-lugar="San Agustín">
        <h2>El Mesón GOURMET San agustín huila</h2>
        <p>Sabor y tradición en cada bocado, ¡una experiencia gourmet en el corazón de San Agustín!</p>
        <div class="imagenes-container">
            <img src="img/s_emg_1.jpg" alt=" Vista 1">
            <img src="img/s_emg_2.jpg" alt="Vista 2">
        </div>
        <p>Servicio de Lunes a Domingo 8:00am - 8:00pm
            <br>Dirección: 418060, San Agustín, Huila, Colombia
            <br>telefono: +57 310 3285323
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones
        </p>
        <div class="contactos">
            <a href="https://wa.me/573122849664">WhatsApp</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
        </div>
    </section>
    <section class="sitio" data-lugar="San Agustín">
        <h2>Restaurante El Fogón</h2>
        <p>El sabor de la tradición en cada plato, ¡ven y disfruta del auténtico sabor huilense!</p>
        <div class="imagenes-container">
            <img src="img/s_ef_1.jpg" alt="Vista 1">
            <img src="img/s_ef_2.jpg" alt="Vista 2">
        </div>
        <p>Servicio de Lunes a Domingo 7:00am - 9:45pm
            <br>Dirección: Cl 5 #144, San Agustín, Huila, Colombia
            <br>telefono:+57 320 8345860
            <br>
            <br>Para obtener mas informacion de promociones, eventos o reservaciones
        </p>
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