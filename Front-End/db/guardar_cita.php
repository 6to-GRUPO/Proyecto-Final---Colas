<?php
include 'conexion.php';

$message = ""; // Variable para almacenar el mensaje de alerta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $especialidad = $_POST['especialidad'];
    $medico = $_POST['medico'];
    $turno = $_POST['turno'];
    $hora = $_POST['hora'];
    $fecha = $_POST['fecha'];
    $celular = $_POST['celular'];
    $motivo = $_POST['motivo'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO registro_citas (Especialidad, Medico, Turno, Hora, Fecha, Celular, Motivo) 
            VALUES ('$especialidad', '$medico', '$turno', '$hora', '$fecha', '$celular', '$motivo')";

    if ($conn->query($sql) === TRUE) {
        $message = "CITA REGISTRADA EXITOSAMENTE";
    } else {
        $message = "Error al registrar la cita: " . $conn->error;
    }

    $conn->close();

    // Devolver el mensaje como respuesta
    echo json_encode(['message' => $message]);
}
?>



