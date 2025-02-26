<?php
// Configuración de la base de datos
$host = 'localhost'; // Servidor de la base de datos
$dbname = 'usuarios'; // Nombre de la base de datos
$user = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos

// Conexión al servidor MySQL
$conexion = new mysqli($host, $user, $password);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conexion->query($sql)) {
    // Seleccionar la base de datos
    $conexion->select_db($dbname);

  // Crear la tabla de usuarios si no existe
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(10) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
    if (!$conexion->query($sql)) {
        die("Error al crear la tabla: " . $conexion->error);
    }
}else {
    die("Error al crear la base de datos: " . $conexion->error);
}
?>