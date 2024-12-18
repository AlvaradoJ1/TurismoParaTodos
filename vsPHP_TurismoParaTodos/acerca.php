<?php
require 'cabecera.php';
// Definir las traducciones en un arreglo asociativo
$translations = [
    'es' => [
        'logo'=>'Acerca',
        'acerca' => 'Acerca de <br> nosotros...',
        'acerca-1'=>'Somos Juan Cristóbal Alvarado y Duverney Torres, estudiantes de Ingeniería de Sistemas en
                la Universidad Nacional Abierta y a Distancia (UNAD). Con esta plataforma, buscamos
                facilitar el acceso a información de sitios turísticos en nuestra región, promoviendo un
                turismo accesible para todos. Creemos en el potencial de la tecnología para mejorar la
                experiencia de los viajeros, por lo que hemos trabajado para desarrollar una herramienta
                que sea intuitiva y útil.',
        'acerca-2'=>'Nuestro compromiso va más allá de esta plataforma: estamos dispuestos a escuchar
                    sugerencias, añadir nuevos sitios turísticos, y crear soluciones innovadoras que
                    beneficien tanto a los visitantes como a las comunidades locales. Agradecemos la
                    oportunidad de contribuir al desarrollo turístico y esperamos que esta iniciativa sea de
                    gran ayuda para quienes deseen explorar y conocer más de nuestra región.',
        'contacto'=>'Contáctanos',
        'nombre'=>'Nombres',
        'apellido'=>'Apellidos',
        'email'=>'Correo electrónico',
        'comentario'=>'Cuéntanos tus solicitudes, sugerencias o comentarios',
        'enviar'=>'Enviar',

    ],
    'en' => [
        'logo'=>'About',
        'acerca' => 'About us...',
        'acerca-1'=>'We are Juan Cristóbal Alvarado and Duverney Torres, students of Systems Engineering at
            the Universidad Nacional Abierta y a Distancia (UNAD). With this platform, we seek to
            facilitate access to information on tourist sites in our region, promoting
            accessible tourism for all. We believe in the potential of technology to improve the
            experience of travelers, so we have worked to develop a tool that is
            intuitive and useful.',
        'acerca-2'=>'Our commitment goes beyond this platform: we are willing to listen to
            suggestions, add new tourist sites, and create innovative solutions that
            benefit both visitors and local communities. We appreciate the
            opportunity to contribute to tourism development and we hope that this initiative will be
            of great help to those who wish to explore and learn more about our region.',
        'contacto'=>'Contact us',
        'nombre'=>'First name',
        'apellido'=>'Last name',
        'email'=>'Email',
        'comentario'=>'Tell us your requests, suggestions or comments',
        'enviar'=>'Send',
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
    <section class="acerca-de">
        <div class="contenedor-acerca">
            <!-- Texto Acerca de Nosotros -->
            <div class="texto-acerca">
                <h2><?php echo $text['acerca']; ?></h2>
                <p><?php echo $text['acerca-1']; ?></p>
                <p><?php echo $text['acerca-2']; ?></p>
            </div>
            <!-- Imagen -->
            <div class="imagen-acerca">
                <img src="img/acerca.png" alt="Equipo de desarrollo">
            </div>
        </div>

        <!-- Formulario de Contacto -->
        <div class="contacto">
            <h3><?php echo $text['contacto']; ?></h3>
            <form>
                <div class="formulario-campos">
                    <input type="text" placeholder="<?php echo $text['nombre']; ?>" required>
                    <input type="text" placeholder="<?php echo $text['apellido']; ?>" required>
                    <input type="email" placeholder="<?php echo $text['email']; ?>" required>
                </div>
                <textarea placeholder="<?php echo $text['comentario']; ?>" rows="4"
                    required></textarea>
                <button type="submit"><?php echo $text['enviar']; ?></button>
            </form>
        </div>
    </section>
</body>

</html>