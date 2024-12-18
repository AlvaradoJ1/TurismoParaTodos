<?php
require 'cabecera.php'; 
// Definir las traducciones en un arreglo asociativo
$translations = [
    'es' => [        
        'hero-title' => 'Bienvenidos a Turismo para Todos',
        'hero-text' => 'Descubre los tesoros escondidos del sur de Huila. Aquí encontrarás las maravillas naturales, la riqueza cultural y las experiencias auténticas que solo esta región puede ofrecerte.',
        'why-visit-title' => '¿Por Qué Visitar el Sur de Huila?',
        'card1-title' => 'Paisajes Inigualables:',
        'card1-text' => 'Desde las misteriosas estatuas de San Agustín hasta el desierto surrealista de la Tatacoa, el sur de Huila ofrece escenarios maravillosos que enamoran a todos los visitantes.',
        'card2-title' => 'Riqueza Cultural y Patrimonio Arqueológico:',
        'card2-text' => 'Sumérgete en la historia de las civilizaciones antiguas con el Parque Arqueológico de San Agustín, un sitio reconocido como Patrimonio de la Humanidad por la UNESCO.',
        'card3-title' => 'Gastronomía Auténtica:',
        'card3-text' => 'Descubre los sabores únicos de la región, desde el asado huilense hasta bebidas tradicionales como el café y la cholupa.',
        'footer-text' => 'Turismo para todos',
        'contact-line' => 'Línea de atención',
        'contact-email' => 'Correo: turismoparatodos123@gmail.com',
        'contact-phone' => 'Teléfonos: +57 3216549870 - +57 3127896045',
        
    ],
    'en' => [
        
        'hero-title' => 'Welcome to Tourism for All',
        'hero-text' => 'Discover the hidden treasures of southern Huila. Here you will find natural wonders, cultural richness, and authentic experiences that only this region can offer you.',
        'why-visit-title' => 'Why Visit Southern Huila?',
        'card1-title' => 'Unparalleled Landscapes:',
        'card1-text' => 'From the mysterious statues of San Agustín to the surreal Tatacoa Desert, southern Huila offers wonderful scenery that enchants all visitors.',
        'card2-title' => 'Cultural Richness and Archaeological Heritage:',
        'card2-text' => 'Immerse yourself in the history of ancient civilizations with the San Agustín Archaeological Park, a UNESCO World Heritage site.',
        'card3-title' => 'Authentic Gastronomy:',
        'card3-text' => 'Discover the unique flavors of the region, from Huilense roast to traditional drinks like coffee and cholupa.',
        'footer-text' => 'Tourism for All',
        'contact-line' => 'Customer Support',
        'contact-email' => 'Email: turismoparatodos123@gmail.com',
        'contact-phone' => 'Phones: +57 3216549870 - +57 3127896045',
    ],
];

// Obtener el idioma desde la URL (por defecto es español)
$lang = isset($_GET['lang']) && array_key_exists($_GET['lang'], $translations) ? $_GET['lang'] : 'es';
$text = $translations[$lang];


?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $text['logo']; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    
    <!-- Sección de bienvenida -->
    <section class="hero">
        <h2><?php echo $text['hero-title']; ?></h2>
        <p><?php echo $text['hero-text']; ?></p>
        <div class="hero-image">
            <picture>
                <source srcset="img/webp/index_1.webp" type="image/webp">
                <img src="img/index_1.png" alt="Sur del Huila">
            </picture>
        </div>
    </section>

    <!-- Sección de Información -->
    <section class="why-visit">
        <h2><?php echo $text['why-visit-title']; ?></h2>
        <div class="cards-container">
            <div class="card">
                <picture>
                    <source srcset="img/webp/index_2.webp" type="image/webp">
                    <img src="img/index_2.png" alt="Paisajes Inigualables">
                </picture>
                <h3><?php echo $text['card1-title']; ?></h3>
                <p><?php echo $text['card1-text']; ?></p>
            </div>
            <div class="card">
                <picture>
                    <source srcset="img/webp/index_3.webp" type="image/webp">
                    <img src="img/index_3.png" alt="Patrimonio Arqueológico">
                </picture>
                <h3><?php echo $text['card2-title']; ?></h3>
                <p><?php echo $text['card2-text']; ?></p>
            </div>
            <div class="card">
                <picture>
                    <source srcset="img/webp/index_4.webp" type="image/webp">
                    <img src="img/index_4.png" alt="Gastronomía Auténtica">
                </picture>
                <h3><?php echo $text['card3-title']; ?></h3>
                <p><?php echo $text['card3-text']; ?></p>
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer>
        <div class="footer-content">
            <p><?php echo $text['footer-text']; ?></p>
            <div class="contact">
                <p><?php echo $text['contact-line']; ?></p>
                <p><?php echo $text['contact-email']; ?></p>
                <p><?php echo $text['contact-phone']; ?></p>
            </div>
        </div>
    </footer>
</body>

</html>