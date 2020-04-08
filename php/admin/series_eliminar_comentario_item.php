<?php
	
	include("conexion_tabla.php");
    $serie = $_REQUEST['serie'];
    $ComentarioID = $_REQUEST['ComentarioID'];
	$pagina = $_REQUEST['pagina'];
	$paginaSeries=$_REQUEST['pagina_series'];
    

    
	$query = "DELETE FROM comentarios_items WHERE ComentarioID = '$ComentarioID'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		$id=$_GET['id'];
		header('Location: series_detalles.php?'.$_SERVER["QUERY_STRING"]);
		}
	else{
		echo "No se elimino";
		}


?>