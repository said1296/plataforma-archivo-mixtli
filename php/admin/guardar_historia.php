<?php
	session_start();
	
	include("../zUtils/conexion_tabla.php");
    
    $autor = $_POST['autor'];
	$titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $texto = $_POST['texto'];
	
	$query = "INSERT INTO historias(autor,titulo,fecha,texto) VALUES('$autor','$titulo','$fecha','$texto')";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: historias.php");
		
		}
	
	else{
		echo "No se inserto";
		
		}



?>