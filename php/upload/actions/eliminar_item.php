<?php
session_start();
include("../../zUtils/conexion_tabla.php");

$serie = $_REQUEST['serie'];
$id = $_REQUEST['id'];
$query = "SELECT * FROM items WHERE id='$id'";
$resultado = $conexion_tabla->query($query);
$row=$resultado->fetch_assoc();
$idUsuario=$row['idUsuario'];
$idSerie=$row['idSerie'];
if($_SESSION['id']!=$idUsuario and $_SESSION['tipo']!=1){
	header('Location: /php/login/index.php');
	exit;
}

$query = "DELETE FROM items WHERE id = '$id'";
$resultado = $conexion_tabla->query($query);

if (mysqli_affected_rows($conexion_tabla)){
	$path="../../../uploads/$idUsuario/$idSerie/$id.jpg";
	unlink($path);
	echo "<script> window.history.go(-1) </script>";
} else {
	echo "NO SE PUDO ELIMINAR.";
}
