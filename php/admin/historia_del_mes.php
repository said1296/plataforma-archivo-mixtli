<?php
	session_start();
	
	include("../utils/conexion_tabla.php");
    
    $id = $_GET['id'];
    
    $query = "UPDATE historias SET mes=0";
    $conexion_tabla->query($query);
	$query = "UPDATE historias SET mes=1 WHERE id='$id'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header('Location: historias.php');
		
		}
	
	else{
		echo "No se inserto";
		
		}



?>