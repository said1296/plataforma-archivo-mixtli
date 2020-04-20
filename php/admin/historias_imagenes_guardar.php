<?php
	session_start();
	
	include("../utils/conexion_tabla.php");
    
    $idItem = $_GET['idItem'];
	$idHistoria = $_GET['id_historia'];
	
	$query = "SELECT MAX(posicion) AS 'maxPosicion' FROM historias_items WHERE idHistoria='$idHistoria'";
	$resultado = $conexion_tabla->query($query);
	if($resultado){
		$row=mysqli_fetch_array($resultado);
		$posicion=$row['maxPosicion']+1;
	}else{
		$posicion=1;	
	}
	$query = "INSERT INTO historias_items(idHistoria,idItem,posicion) VALUES('$idHistoria','$idItem','$posicion')";
	$resultado = $conexion_tabla->query($query);

	if($resultado){
		header('Location: historias_imagenes_modificar.php?id_historia='.$idHistoria);
	}
	else{
		echo "No se inserto";
	}
?>