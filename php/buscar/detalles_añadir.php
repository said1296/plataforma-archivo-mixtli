<?php
	session_start();
	
	include("../zUtils/conexion_tabla.php");

	$tipo=$_GET['tipo'];
	$id = $_GET['id'];
	parse_str($_SERVER['QUERY_STRING'],$queryArray);

	if($tipo=="descriptores"){
		$descriptores_nuevos = $_GET['descriptores'];
		unset($queryArray['descriptores']);
		
		$query = "SELECT descriptores AS 'descriptores' FROM items WHERE id='$id'";
		$resultado = $conexion_tabla->query($query);
		$row = mysqli_fetch_array($resultado);
		$descriptores = $row['descriptores'].",".$descriptores_nuevos;
	
		$query = "UPDATE items SET descriptores='$descriptores' WHERE id='$id'";
		$resultado = $conexion_tabla->query($query);
	}elseif($tipo=="personajes"){
		$personajes_nuevos = $_GET['personajes'];
		unset($queryArray['personajes']);
		
		$query = "SELECT personajes AS 'personajes' FROM items WHERE id='$id'";
		$resultado = $conexion_tabla->query($query);
		$row = mysqli_fetch_array($resultado);
		$personajes = $row['personajes'].",".$personajes_nuevos;
	
		$query = "UPDATE items SET personajes='$personajes' WHERE id='$id'";
		$resultado = $conexion_tabla->query($query);
	}elseif($tipo=="lugares"){
		$lugares_nuevos = $_GET['lugares'];
		unset($queryArray['lugares']);
		
		$query = "SELECT lugar AS 'lugares' FROM items WHERE id='$id'";
		$resultado = $conexion_tabla->query($query);
		$row = mysqli_fetch_array($resultado);
		$lugares = $row['lugares'].",".$lugares_nuevos;
	
		$query = "UPDATE items SET lugar='$lugares' WHERE id='$id'";
		$resultado = $conexion_tabla->query($query);
	}elseif($tipo=="descripcion"){
		$Descripcion = $_GET['descripcion'];
		$ColeccionesID = $_GET['id'];
		unset($queryArray['descripcion']);
		
		$query = "INSERT INTO descripciones(ColeccionesID,Descripcion) VALUES('$ColeccionesID','$Descripcion')";
		$resultado = $conexion_tabla->query($query);
	}

	$ref = $_GET['ref'];
	unset($queryArray['ref']);
	$queryString=http_build_query($queryArray);
	header('Location: '.$ref.'?'.$queryString);

?>