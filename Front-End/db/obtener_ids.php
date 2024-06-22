<?php
include 'conexion.php';

// Consulta SQL para obtener todos los registros de la tabla
$sql = "SELECT id FROM registro_citas";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Array para almacenar los datos
    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row; // Agregar cada fila al array
    }

    // Convertir el array a formato JSON y devolverlo
    echo json_encode($rows);
} else {
    echo json_encode(array()); // Si no hay resultados, devolver un array vacío en JSON
}

$conn->close();
?>