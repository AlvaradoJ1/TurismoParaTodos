<?php 
// Definir las traducciones en un arreglo asociativo
$translations = [
    'es' => [
        'logo' => 'Turismo para todos',
        'sitios' => 'SITIOS',
        'restaurantes' => 'RESTAURANTES',
        'hoteles' => 'HOTELES',
        'transporte' => 'TRANSPORTE',
        'acerca' => 'ACERCA',
        'language-switch' => 'English'     
    ],
    'en' => [
        'logo' => 'Tourism for All',
        'sitios' => 'SITES',
        'restaurantes' => 'RESTAURANTS',
        'hoteles' => 'HOTELS',
        'transporte' => 'TRANSPORT',
        'acerca' => 'ABOUT',
        'language-switch' => 'Español',
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
    <!-- Encabezado -->
    <header>
        <nav class="navbar">
            <h1 class="logo"><a href="index.php?lang=<?php echo $lang; ?>" id="logo"><?php echo $text['logo']; ?></a></h1>
            <ul class="nav-links">
                <li><a href="sitios.php?lang=<?php echo $lang; ?>" id="sitios"><?php echo $text['sitios']; ?></a></li>
                <li><a href="restaurantes.php?lang=<?php echo $lang; ?>" id="restaurantes"><?php echo $text['restaurantes']; ?></a></li>
                <li><a href="hoteles.php?lang=<?php echo $lang; ?>" id="hoteles"><?php echo $text['hoteles']; ?></a></li>
                <li><a href="transporte.php?lang=<?php echo $lang; ?>" id="transporte"><?php echo $text['transporte']; ?></a></li>
                <li class="acerca-container">
                        <button><a href="acerca.php?lang=<?php echo $lang; ?>" id="acerca" class="active"><?php echo $text['acerca']; ?></a></button></li>
                <!-- Botón para cambiar idioma -->
                <li>
                    <span class="language-switch">
                        <a href="?lang=<?php echo $lang === 'es' ? 'en' : 'es'; ?>">
                            <?php echo $text['language-switch']; ?>
                        </a>
                    </span>
                </li>
            </ul>
        </nav>
    </header>

</body>
</html>