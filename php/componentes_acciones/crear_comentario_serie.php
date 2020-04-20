<?php
include('../utils/conexion_tabla.php');

$idSerie = $_POST['idSerie'];
$usuario = $_POST['usuario'];
$comentario = $_POST['comentario'];

$query = "INSERT INTO comentarios_series (idSerie, usuario,comentario) VALUES('$idSerie','$usuario','$comentario')";
$resultado = $conexion_tabla->query($query);

if(mysqli_affected_rows($conexion_tabla)>0){
	echo "<script> window.location.replace(document.referrer); </script>";
}
else{
	echo "<h1>No se creo</h1><br /> <br />";
	echo "<h1>".mysqli_error($conexion_tabla)."</h1>";
}