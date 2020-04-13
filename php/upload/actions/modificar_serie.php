<?php
session_start();
include("../../zUtils/conexion_tabla.php");

$id = $_POST['idSerie'];
$query = "SELECT * FROM series WHERE id='$id' LIMIT 1";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();
$idUsuario = $row['idUsuario'];
$imgSerie = file_get_contents($_FILES['imgSerie']['tmp_name']);
$filename = $_FILES['imgSerie']['name'];

if ($_SESSION['id'] == $idUsuario or $_SESSION['tipo'] == 1) {
    $serie = $_POST['serie'];
    $grupo = $_POST['grupo'];
    $descripcion_serie = $_POST['descripcion_serie'];
    $query = "UPDATE series SET grupo='$grupo', serie='$serie',descripcion_serie='$descripcion_serie' WHERE id='$id' LIMIT 1";
    $resultado = $conexion_tabla->query($query);
    if (mysqli_affected_rows($conexion_tabla) > 0 or $imgSerie) {
        if ($imgSerie) {
            $uploadDir = '../../../uploads/' . implode("/", [$idUsuario, $id]);
            $uploadPath = $uploadDir . "/0.jpg";
            $ext = end(explode(".", $filename));
            if ($ext != 'jpg' and $ext != 'jpeg' and $ext != 'JPG' and $ext != 'JPEG') {
                $f = imagejpeg(imagecreatefromstring($imgSerie), $uploadPath, 100);
            } else {
                $f = file_put_contents($uploadPath, $imgSerie);
            }
            if ($f) {
                echo '<script>window.history.go(-2)</script>';
            } else {
                echo "ERROR SUBIENDO IMAGEN";
            }
        } else {
            //echo '<script>javascript:history.go(-2)</script>';
        }
    } else {
        echo "<h1>HUBO UN ERROR.</h1>";
    }
} else {
    "<h1>ERROR CON LOS PERMISOS.</h1>";
}
