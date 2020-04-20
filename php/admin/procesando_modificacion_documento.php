<?php
	
	include("../utils/conexion_tabla.php");
	
	$id = $_REQUEST['id'];
	
	$documento = $_POST['documento'];
	$ano = $_POST['ano'];
	$link = $_POST['link'];
	$imgD = addslashes(file_get_contents($_FILES['imgD']['tmp_name']));
	
	$query = "UPDATE documentos SET documento='$documento', ano='$ano', link='$link' , imgD='$imgD' WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: documentos.php");
		
		}
	
	else{
		echo "No se modifico";
		
		}



?>