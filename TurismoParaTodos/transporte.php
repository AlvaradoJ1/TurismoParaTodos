<?php
require 'cabecera.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transporte</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <!-- Buscador -->
    <div class="buscador">
        <input type="text" id="buscador" placeholder="Buscar lugares (ej: Pitalito)">
    </div>
    <section class="sitio" data-lugar="Pitalito">
        <h2>Taxi: <strong>Líneas Timanco</strong></h2>
        <div class="transporte-container">
            <!-- Imagen principal a la izquierda -->
            <div class="imagen-izquierda">
                <img src="img/p_tt_1.png" alt="Taxi Líneas Timanco">
            </div>
            <!-- Contenedor con imagen secundaria y texto -->
            <div class="info-derecha">
                <img src="img/p_tt_2.png" alt="Flota de Taxis">
                <div class="info-texto">
                    <p><strong>Servicio 24/7</strong><br>
                        Correo: lineastimanco@hotmail.com
                        <br>Teléfono: +57 320 4353737
                        <br>
                        <br>“Más que un servicio de transporte, un compromiso con tu comodidad y confianza en cada kilómetro”
                    </p>
                    <button class="ver-detalles">Ver detalles</button>
                </div>
            </div>
        </div>
    </section>
    <section class="sitio" data-lugar="San Agustín">
        <h2>Taxi: <strong>Líneas Timanco</strong></h2>
        <div class="transporte-container">
            <!-- Imagen principal a la izquierda -->
            <div class="imagen-izquierda">
                <img src="img/s_cc_1.png" alt="Camioneta">
            </div>
            <!-- Contenedor con imagen secundaria y texto -->
            <div class="info-derecha">
                <img src="img/s_cc_2.png" alt="Camioneta">
                <div class="info-texto">
                    <p>Horario de atención: Lunes a Viernes 7:00 a.m. - 12:00 p.m. 2:00 p.m. - 6:00 p.m.
                        <br>Correo: clientes@cootranshuila.com
                        <br>Teléfono: (8) 836 0204
                        <br>
                        <br>“Llegamos lejos contigo, conectando cada destino”
                    </p>
                    <button class="ver-detalles">Ver detalles</button>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript para el buscador -->
    <script src="js/script.js"></script>
</body>

</html>