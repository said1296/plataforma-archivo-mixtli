<?php
session_start();
include("../../utils/conexion_tabla.php");

$idHistoria = $_REQUEST['idHistoria'];
$query="SELECT * FROM historias WHERE id=$idHistoria";
$resultado=$conexion_tabla->query($query);
$row=$resultado->fetch_assoc();
$idUsuario=$row['idUsuario'];

if($_SESSION['id'] == $idUsuario or $_SESSION['tipo'] == 1) {
	$query = "DELETE FROM historias_items WHERE idHistoria = $idHistoria";
	$resultado = $conexion_tabla->query($query);

	$query = "DELETE FROM historias WHERE id = '$idHistoria'";
	$resultado = $conexion_tabla->query($query);
	if (mysqli_affected_rows($conexion_tabla) > 0) {
		echo "<script> window.history.go(-1) </script>";
	}else{
		echo "ERROR ELIMINANDO HISTORIA";
	}
} else {
	echo "ERROR CON LOS PERMISOS.";
}