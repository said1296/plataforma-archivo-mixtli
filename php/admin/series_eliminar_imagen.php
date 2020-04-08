<?php
	
	include("../includes/conexion_tabla.php");
	
    $serie = $_REQUEST['serie'];
    $id = $_REQUEST['id'];
	$pagina = $_REQUEST['pagina'];
	$paginaSeries=$_REQUEST['pagina_series'];
    

    
	$query = "DELETE FROM colecciones WHERE id = '$id'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		if(isset($_GET['pagina_series'])){
			header('Location: series_imagenes.php?serie='.$serie."&pagina=".$pagina."&pagina_series=".$paginaSeries);
		}elseif(isset($_GET['pagina_buscar'])){
			header('Location: series_imagenes.php?serie='.$serie.'&consulta='.$_GET['consulta'].'&pagina='.$pagina.'&pagina_buscar='.$_GET['pagina_buscar']);
		}else{
			header('Location: series_buscar.php?consulta='.$_GET['consulta']."&pagina=".$pagina);
		}
	}
	
	else{
		echo "No se elimino";
		
		}


?>