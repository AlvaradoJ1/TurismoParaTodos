<?php
// Incluir la configuración de la base de datos
require_once __DIR__ . '/../config/database.php';

/**
 * Registrar un nuevo usuario.
 *
 * @param string $usuario Nombre de usuario.
 * @param string $email Correo electrónico del usuario.
 * @param string $password Contraseña del usuario.
 * @return bool Retorna true si el registro es exitoso, false si falla.
 */
function registrarUsuario($user, $email, $password) {
    global $conexion;

    // Hashear la contraseña
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Consulta preparada para insertar el usuario
    $sql = "INSERT INTO usuarios (user, email, password) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param('sss', $user, $email, $password_hashed);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true; // Registro exitoso
        } else {
            return false; // Error al registrar
        }

        // Cerrar la consulta preparada
        $stmt->close();
    } else {
        return false; // Error en la consulta
    }
}

/**
 * Validar el inicio de sesión de un usuario.
 *
 * @param string $email Correo electrónico del usuario.
 * @param string $password Contraseña del usuario.
 * @return array|null Retorna los datos del usuario si la autenticación es exitosa, o null si falla.
 */
function validarLogin($email, $password) {
    global $conexion;

    // Consulta preparada para buscar el usuario
    $sql = "SELECT id, user, email, password FROM usuarios WHERE email = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Vincular el parámetro (email)
        $stmt->bind_param('s', $email);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $stmt->store_result();

        // Verificar si se encontró un usuario
        if ($stmt->num_rows > 0) {
            // Vincular las columnas del resultado
            $stmt->bind_result($id, $user, $email_db, $password_db);

            // Obtener los datos
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($password, $password_db)) {
                return [
                    'id' => $id,
                    'usuario' => $user,
                    'email' => $email_db
                ];
            }
        }

        // Cerrar la consulta preparada
        $stmt->close();
    }

    return null; // Autenticación fallida
}
?>