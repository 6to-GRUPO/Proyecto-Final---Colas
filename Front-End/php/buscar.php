<?php
// Incluir el archivo de conexión a la base de datos
include("../php/conexion.php");

// Obtener el término de búsqueda desde la solicitud POST
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    // Consulta SQL para buscar pacientes por nombre
    $sql = "SELECT nombre, correo, imagen, estado, edad FROM pacientes WHERE nombre LIKE '%$search%'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $response = [];
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'No se encontraron resultados']);
    }
} else {
    echo json_encode(['error' => 'No se recibió el término de búsqueda']);
}

// Cerrar la conexión
mysqli_close($con);
?>

