<?php
$servername = "localhost"; // o el servidor de tu base de datos
$username = "root"; // tu nombre de usuario de phpMyAdmin
$password = ""; // tu contraseña de phpMyAdmin
$dbname = "citas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>