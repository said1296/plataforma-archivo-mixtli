<?php
session_start();
include('../../utils/conexion_tabla.php');

$idItem = $_POST['idItem'];
$lugares_nuevos = $_POST['lugares'];

$query = "SELECT lugar AS 'lugares' FROM items WHERE id='$idItem'";
$resultado = $conexion_tabla->query($query);
$row = mysqli_fetch_array($resultado);
$lugares = $row['lugares'].",".$lugares_nuevos;

$query = "UPDATE items SET lugar='$lugares' WHERE id='$idItem'";
$resultado = $conexion_tabla->query($query);

if (mysqli_affected_rows($conexion_tabla) > 0) {
    echo "<script> window.history.go(-1) </script>";
} else {
    echo "<h1>No se crearon los lugares</h1><br /> <br />";
    echo "<h1>" . mysqli_error($conexion_tabla) . "</h1>";
}
