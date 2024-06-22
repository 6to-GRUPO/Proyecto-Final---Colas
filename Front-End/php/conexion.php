<?php
$con = new mysqli("localhost", "root", "", "citas");
if ($con->connect_error)
    die("conexion fallada" . $con->connect_error);
?>