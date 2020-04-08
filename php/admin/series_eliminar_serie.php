<?php
	
	include("conexion_tabla.php");
	
	$id = $_REQUEST['id'];

	$query = "SELECT * FROM series WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);
	$row = $resultado->fetch_assoc();
	$serie = $row['serie'];

	if($resultado)
	{
		$query = "DELETE FROM series WHERE id = '$id'";
		$resultado = $conexion_tabla->query($query);
	
		if($resultado){
			$query = "DELETE FROM colecciones WHERE serie = '$serie'";
			$resultado = $conexion_tabla->query($query);
	
			$ref = $_REQUEST['ref'];
			parse_str($_SERVER['QUERY_STRING'],$queryArray);
			unset($queryArray['ref']);
			unset($queryArray['id']);
			$queryString=http_build_query($queryArray);
			$pagina=$_GET['pagina'];
			header ("Location: ".$ref."?".$queryString);
			}
		else{
			echo "No se eliminó";
		}
	}else{
		echo "No se eliminó";
	}



?>