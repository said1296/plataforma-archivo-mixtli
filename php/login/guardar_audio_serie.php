<?php
	session_start();
  
 	include("../utils/conexion_tabla.php");
	
	$coleccion = $_POST['coleccion'];
	echo $coleccion;
	$autor = $_POST['autor'];
	$usuario = $_SESSION['u_usuario'];
	$grupo = $_POST['grupo'];
	$serie = $_POST['serie'];
    $descripcion_serie = $_POST['descripcion_serie'];
	
	$fecha = $_POST['fecha'];
	$lugar = $_POST['lugar'];
	$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	$descripcion_img = $_POST['descripcion_img'];
	$descriptores = $_POST['descriptores'];
    $personajes = $_POST['personajes'];
    
    $link = $_POST['link'];
    $tipo = "audio";

	$query = "SELECT * FROM series WHERE usuario='$usuario' AND coleccion ='$coleccion'";
    $resultado = $conexion_tabla->query($query);

	if(mysqli_num_rows($resultado)>0){
		$query = "INSERT INTO items (coleccion,autor,usuario,grupo,serie,descripcion_serie,fecha,lugar,descripcion_img,descriptores,personajes,img,link,tipo) VALUES('$coleccion','$autor','$usuario','$grupo','$serie','$descripcion_serie','$fecha','$lugar','$descripcion_img','$descriptores','$personajes','$img','$link', '$tipo')";
		$resultado = $conexion_tabla->query($query);
	}
	else{
		$resultado=FALSE;
	}
	
	if($resultado){
		header ("Location: sesion.php");
	}
	else{
		echo "HUBO UN ERROR";
	}

?>