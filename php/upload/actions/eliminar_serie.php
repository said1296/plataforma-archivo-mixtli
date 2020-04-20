<?php
session_start();
include("../../utils/conexion_tabla.php");

$idSerie = $_REQUEST['idSerie'];
$query = "SELECT * FROM series WHERE id = '$idSerie' LIMIT 1";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();
$idUsuario = $row['idUsuario'];
if ($_SESSION['id'] != $idUsuario and $_SESSION['tipo'] != 1) {
	header("Location: /php/login/index.php");
	exit;
}

$path = "../../../uploads/$idUsuario/$idSerie";
$files = glob($path . '/*');
foreach ($files as $file) {
	unlink($file);
}
if(rmdir($path)){
	$query = "DELETE FROM items WHERE idSerie = '$idSerie'";
	$resultado = $conexion_tabla->query($query);
	$query = "DELETE FROM series WHERE id = '$idSerie' LIMIT 1";
	$resultado = $conexion_tabla->query($query);
	if(mysqli_affected_rows($conexion_tabla)>0){
		echo "<script> window.history.go(-1) </script>";
	}else{
		echo "<h1>NO SE PUDO BORRAR SERIE DE BASE DE DATOS</h1>";
	}
}else{
	echo "<h1> ERROR BORRANDO DIRECTORIO CON IMÁGENES DE LA SERIE.</h1>";
}