<?php
	
	include("conexion_tabla.php");
	
	$id = $_POST['id_relacion'];
	$posicion = $_POST['posicion'];
	$id_historia = $_POST['id_historia'];

	$query = "UPDATE historias_imgs SET posicion='$posicion' WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);

	header ("Location: historias_modificar_imagenes.php?id_historia=".$id_historia);




?>