<?php
	session_start();
  
 	include("conexion_tabla.php");
	
	$coleccion = $_POST['coleccion'];
	$autor = $_POST['autor'];
	$usuario = $_SESSION['u_usuario'];
	$grupo = $_POST['grupo'];
	$serie = $_POST['serie'];
	$descripcion_serie = $_POST['descripcion_serie'];
	$imgSerie = addslashes(file_get_contents($_FILES['imgSerie']['tmp_name']));
	
	
	$query = "INSERT INTO series (coleccion,autor,usuario,grupo,serie,descripcion_serie,imgSerie) VALUES('$coleccion','$autor','$usuario','$grupo','$serie','$descripcion_serie','$imgSerie')";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: sesion.php");
		
		}
	
	else{
		echo "No se inserto";
		
		}

	

?>