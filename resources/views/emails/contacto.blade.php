<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body>
    <h2>Has recibido un nuevo mensaje de contacto</h2>
    
    <p><strong>Nombre:</strong> {{ $datos['nombre'] }}</p>
    <p><strong>Número:</strong> {{ $datos['numero'] ?? 'No proporcionado' }}</p>
    <p><strong>Email:</strong> {{ $datos['email'] }}</p>
    <p><strong>Comentario:</strong></p>
    <p>{{ $datos['comentario'] }}</p>

    <p>Enviado desde la página de contacto.</p>
</body>
</html>
