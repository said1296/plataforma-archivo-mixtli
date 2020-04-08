<?php
	
	include("conexion_tabla.php");
	
	$id = $_REQUEST['id'];
	
	$query = "DELETE FROM historias WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: historias.php");
		
		}
	
	else{
		echo "No se elimino";
		
		}



?>