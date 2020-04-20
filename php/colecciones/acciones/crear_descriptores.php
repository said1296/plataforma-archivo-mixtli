<?php
session_start();
include('../../utils/conexion_tabla.php');

$idItem = $_POST['idItem'];
$descriptores_nuevos = $_POST['descriptores'];

$query = "SELECT descriptores AS 'descriptores' FROM items WHERE id='$idItem'";
$resultado = $conexion_tabla->query($query);
$row = mysqli_fetch_array($resultado);
$descriptores = $row['descriptores'].",".$descriptores_nuevos;

$query = "UPDATE items SET descriptores='$descriptores' WHERE id='$idItem'";
$resultado = $conexion_tabla->query($query);

if (mysqli_affected_rows($conexion_tabla) > 0) {
    echo "<script> window.history.go(-1) </script>";
} else {
    echo "<h1>No se crearon descriptores</h1><br /> <br />";
    echo "<h1>" . mysqli_error($conexion_tabla) . "</h1>";
}
