<?php
session_start();
include('../../utils/conexion_tabla.php');

$idItem = $_POST['idItem'];
$personajes_nuevos = $_POST['personajes'];

$query = "SELECT personajes AS 'personajes' FROM items WHERE id='$idItem'";
$resultado = $conexion_tabla->query($query);
$row = mysqli_fetch_array($resultado);
$personajes = $row['personajes'] . "," . $personajes_nuevos;

$query = "UPDATE items SET personajes='$personajes' WHERE id='$idItem'";
$resultado = $conexion_tabla->query($query);

if (mysqli_affected_rows($conexion_tabla) > 0) {
    echo "<script> window.history.go(-1) </script>";
} else {
    echo "<h1>No se crearon personajes</h1><br /> <br />";
    echo "<h1>" . mysqli_error($conexion_tabla) . "</h1>";
}
