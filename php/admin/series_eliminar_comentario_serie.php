<?php
	
	include("../includes/conexion_tabla.php");
	
    $serie = $_REQUEST['serie'];
    $ComentarioID = $_REQUEST['ComentarioID'];
	$pagina = $_REQUEST['pagina'];
	$paginaSeries=$_REQUEST['pagina_series'];
    

    
	$query = "DELETE FROM comentarios_series WHERE ComentarioID = '$ComentarioID'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		header('Location: series_imagenes.php?'.$_SERVER["QUERY_STRING"]);
		}
	else{
		echo "No se elimino";
		}


?>