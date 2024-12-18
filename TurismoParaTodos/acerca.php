<?php
require 'cabecera.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <section class="acerca-de">
        <div class="contenedor-acerca">
            <!-- Texto Acerca de Nosotros -->
            <div class="texto-acerca">
                <h2>Acerca de <br> nosotros...</h2>
                <p>Somos Juan Cristóbal Alvarado y Duverney Torres, estudiantes de Ingeniería de Sistemas en
                    la Universidad Nacional Abierta y a Distancia (UNAD). Con esta plataforma, buscamos
                    facilitar el acceso a información de sitios turísticos en nuestra región, promoviendo un
                    turismo accesible para todos. Creemos en el potencial de la tecnología para mejorar la
                    experiencia de los viajeros, por lo que hemos trabajado para desarrollar una herramienta
                    que sea intuitiva y útil.</p>
                <p>Nuestro compromiso va más allá de esta plataforma: estamos dispuestos a escuchar
                    sugerencias, añadir nuevos sitios turísticos, y crear soluciones innovadoras que
                    beneficien tanto a los visitantes como a las comunidades locales. Agradecemos la
                    oportunidad de contribuir al desarrollo turístico y esperamos que esta iniciativa sea de
                    gran ayuda para quienes deseen explorar y conocer más de nuestra región.</p>
            </div>
            <!-- Imagen -->
            <div class="imagen-acerca">
                <img src="img/acerca.png" alt="Equipo de desarrollo">
            </div>
        </div>

        <!-- Formulario de Contacto -->
        <div class="contacto">
            <h3>Contáctanos</h3>
            <form>
                <div class="formulario-campos">
                    <input type="text" placeholder="Nombres" required>
                    <input type="text" placeholder="Apellidos" required>
                    <input type="email" placeholder="Correo electrónico" required>
                </div>
                <textarea placeholder="Cuéntanos tus solicitudes, sugerencias o comentarios" rows="4"
                    required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>
</body>

</html>