<?php
	
	include("../includes/conexion_tabla.php");
	
	$id = $_REQUEST['id'];

    $autor = $_POST['autor'];
	$titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $texto = $_POST['texto'];
	
	$query = "UPDATE historias SET autor='$autor', titulo='$titulo', fecha='$fecha' , texto='$texto' WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: historias.php");
		
		}
	
	else{
		echo "No se modifico";
		
		}



?>