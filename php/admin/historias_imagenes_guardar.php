<?php
	session_start();
	
	include("../zUtils/conexion_tabla.php");
    
    $id_colecciones = $_GET['id_colecciones'];
	$id_historias = $_GET['id_historia'];
	
	$query = "SELECT MAX(posicion) AS 'maxPosicion' FROM historias_imgs WHERE id_historias='$id_historias'";
	$resultado = $conexion_tabla->query($query);
	if($resultado){
		$row=mysqli_fetch_array($resultado);
		$posicion=$row['maxPosicion']+1;
	}else{
		$posicion=1;	
	}
	$query = "INSERT INTO historias_imgs(id_historias,id_colecciones,posicion) VALUES('$id_historias','$id_colecciones','$posicion')";
	$resultado = $conexion_tabla->query($query);

	if($resultado){
		header('Location: historias_imagenes_modificar.php?id_historia='.$id_historias);
	}
	else{
		echo "No se inserto";
	}
?>