<?php
	session_start();
  
 
	
	
	include("../includes/conexion_tabla.php");
	
	$documento = $_POST['documento'];
	$ano = $_POST['ano'];
	$link = $_POST['link'];
	$imgD = addslashes(file_get_contents($_FILES['imgD']['tmp_name']));
	
	
	$query = "INSERT INTO documentos (documento,ano,link,imgD) VALUES('$documento','$ano','$link','$imgD')";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: documentos.php");
		
		}
	
	else{
		echo "No se inserto";
		
		}



?>