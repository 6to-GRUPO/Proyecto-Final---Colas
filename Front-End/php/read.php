<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            color:white;
        }
        table{
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<?php
include("conexion.php");
if (isset($_GET['ordenar']))
{
    $ordenar=$_GET['ordenar'];
}
else
{
    $ordenar="id";
}
if (isset($_GET['filtro']))
{
    $filtro=$_GET['filtro'];
    $sql_libros = "SELECT l.id, l.titulo, l.autor, e.editorial, l.anio, l.imagen
            FROM libros l
            INNER JOIN editoriales e ON l.idEditorial = e.id like '%$filtro%' or apellidos like '%$filtro%' order by $ordenar asc";
}
else
{
    $sql_libros = "SELECT l.id, l.titulo, l.autor, e.editorial, l.anio , l.imagen
            FROM libros l
            INNER JOIN editoriales e ON l.idEditorial = e.id order by $ordenar asc";
}
$result = $con->query($sql_libros);
$i = 1;
if ($result->num_rows > 0) {
?>
    <table border='1'>
        <tr style="background-color: #0070C0 ; color:white">
            <th>Imagen</th>
            <th><a href="read.php?ordenar=imagen">Titulo</a></th>
            <th><a href="read.php?ordenar=autor">Autor</a></th>
            <th><a href="read.php?ordenar=editorial">Editorial</a></th>
            <th><a href="read.php?ordenar=anio">Año</a></th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><img src="images/<?php echo $row["imagen"]; ?>" width="50" height="50"></td>
                <td><?php echo $row["titulo"]; ?></td>
                <td><?php echo $row["autor"]; ?></td>
                <td><?php echo $row["editorial"]; ?></td>
                <td><?php echo $row["anio"]; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php
} else {
    echo "0 resultados";
}
mysqli_close($con);
?>
</body>
</html>


