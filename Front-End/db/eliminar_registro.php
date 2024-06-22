<?php
// Verificar si se recibió un ID válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Conectarse a la base de datos (Ejemplo usando MySQLi)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "citas";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta DELETE
    $sql = "DELETE FROM registro_citas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Si la eliminación fue exitosa, devolver un mensaje JSON
        echo json_encode(array("message" => "Registro eliminado correctamente"));
    } 

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se recibió un ID válido, devolver un mensaje de error JSON
    echo json_encode(array("error" => "ID de registro no proporcionado"));
}
?>
