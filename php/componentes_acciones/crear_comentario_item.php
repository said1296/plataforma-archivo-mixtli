<?php
include('../utils/conexion_tabla.php');

$idItem = $_POST['idItem'];
$usuario = $_POST['usuario'];
$comentario = $_POST['comentario'];

$query = "INSERT INTO comentarios_items (idItem,usuario,comentario) VALUES('$idItem','$usuario','$comentario')";
$resultado = $conexion_tabla->query($query);
echo mysqli_errno($conexion_tabla);

if(mysqli_affected_rows($conexion_tabla)>0){
	echo "<script> window.location.replace(document.referrer); </script>";
}
else{
	echo "<h1>No se creo</h1><br /> <br />";
	echo "<h1>".mysqli_error($conexion_tabla)."</h1>";
}