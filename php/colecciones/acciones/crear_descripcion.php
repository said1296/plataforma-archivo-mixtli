<?php
session_start();
include('../../utils/conexion_tabla.php');

$idItem = $_POST['idItem'];
$descripcion = $_POST['descripcion'];

$query = "INSERT INTO descripciones (idItem,descripcion) VALUES('$idItem','$descripcion')";
$resultado = $conexion_tabla->query($query) or die(mysqli_error($conexion_tabla));

if(mysqli_affected_rows($conexion_tabla)>0){
    echo "<script> window.history.go(-1) </script>";
}
else{
	echo "<h1>No se creo</h1><br /> <br />";
	echo "<h1>".mysqli_error($conexion_tabla)."</h1>";
}