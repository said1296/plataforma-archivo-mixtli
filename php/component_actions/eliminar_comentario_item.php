<?php
session_start();
if($_SESSION['tipo']==1){
	include("../zUtils/conexion_tabla.php");
	$ComentarioID = $_POST['ComentarioID'];
	
	$query = "DELETE FROM comentarios_items WHERE ComentarioID = '$ComentarioID' LIMIT 1";
	$resultado = $conexion_tabla->query($query);
	
	if(mysqli_affected_rows($conexion_tabla)>0){
		echo "<script> window.location.replace(document.referrer); </script>";
	}
	else{
		echo "<h1>No se eliminó</h1><br /> <br />";
		echo "<h1>".mysqli_error($conexion_tabla)."</h1>";
	}
}