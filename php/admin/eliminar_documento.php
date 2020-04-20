<?php
	
	include("../utils/conexion_tabla.php");
	
	$id = $_REQUEST['id'];
	
	$query = "DELETE FROM documentos WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: documentos.php");
		
		}
	
	else{
		echo "No se elimino";
		
		}



?>