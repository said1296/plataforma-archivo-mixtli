<?php
session_start();
include("../../utils/conexion_tabla.php");

$idHistoria = $_REQUEST['idHistoria'];
$idItem = $_REQUEST['idItem'];
$idUsuario = $_REQUEST['idUsuario'];
if ($_SESSION['id'] == $idUsuario or $_SESSION['tipo'] == 1) {
	$query = "DELETE FROM historias_items WHERE idHistoria = '$idHistoria' AND idItem='$idItem'";
	$resultado = $conexion_tabla->query($query);

	if (mysqli_affected_rows($conexion_tabla) > 0) {
		echo "<script> window.history.go(-1) </script>";
	} else {
		echo "ERROR ELIMINANDO IMAGEN DE HISTORIA";
	}
} else {
	echo "ERROR CON LOS PERMISOS.";
}