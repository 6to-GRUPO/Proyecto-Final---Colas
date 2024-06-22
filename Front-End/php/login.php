<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Obtenemos los datos del formulario de login
$data = json_decode(file_get_contents('php://input'), true);

$email = $data['email'];
$password = $data['password'];

// Consulta SQL para verificar las credenciales
$query = "SELECT id, nivel FROM usuarios WHERE correo = ? AND password = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$stmt->store_result();

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($stmt->num_rows > 0) {
    // Obtener el nivel del usuario
    $stmt->bind_result($id, $nivel);
    $stmt->fetch();

    // Crear un array de respuesta
    $response = [
        'success' => true,
        'id' => $id,
        'nivel' => $nivel
    ];
} else {
    // Respuesta de error si las credenciales no son válidas
    $response = [
        'success' => false,
        'message' => 'Correo electrónico o contraseña incorrectos.'
    ];
}

// Cerrar la conexión y devolver la respuesta como JSON
$stmt->close();
$con->close();

header('Content-Type: application/json');
echo json_encode($response);
?>

