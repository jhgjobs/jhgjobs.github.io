<?php
// 1. Indicar al cliente que responderemos en formato JSON
header("Content-Type: application/json");

// 2. Obtener el método HTTP utilizado (GET, POST, etc.)
$method = $_SERVER['REQUEST_METHOD'];

// 3. Simular algunos datos de prueba
$usuarios = [
    ["id" => 1, "nombre" => "Ana", "rol" => "Developer"],
    ["id" => 2, "nombre" => "Carlos", "rol" => "Designer"]
];

// 4. Manejar la petición según el método
switch ($method) {
    case 'GET':
        // Devolver la lista completa de usuarios
        echo json_encode([
            "status" => "success",
            "data" => $usuarios
        ]);
        break;
  
    case 'POST':
        // Leer los datos JSON que envía el cliente
        $json_recibido = file_get_contents('php://input');
        $datos = json_decode($json_recibido, true);

        // Responder simulando que guardamos el dato
        echo json_encode([
            "status" => "created",
            "mensaje" => "Usuario agregado con éxito",
            "datos_recibidos" => $datos
        ]);
        break;

    default:
        // Si usan un método no permitido (como PUT o DELETE)
        http_response_code(405);
        echo json_encode([
            "status" => "error",
            "mensaje" => "Método no permitido"
        ]);
        break;
}
