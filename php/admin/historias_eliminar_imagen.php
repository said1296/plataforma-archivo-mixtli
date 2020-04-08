<?php
	
	include("../includes/conexion_tabla.php");
	
    $id_historia = $_REQUEST['id_historia'];
    $id = $_REQUEST['id'];

    
	$query = "DELETE FROM historias_imgs WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);

	parse_str($_SERVER['QUERY_STRING'],$queryArray);
	$ref=$queryArray['ref'];
	unset($queryArray['ref']);
	unset($queryArray['id']);
	$queryString=http_build_query($queryArray);
	echo $ref.'?'.$queryString;
	
	if($resultado){
		header('Location: '.$ref.'?'.$queryString);
		}
	
	else{
		echo "No se elimino";
		
		}


?>