<?php
	
    include("conexion_tabla.php");
    
    $DescripcionID = $_REQUEST['DescripcionID'];
        
	$query = "DELETE FROM descripciones WHERE DescripcionID = '$DescripcionID'";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
        $id = $_GET['id'];
        $serie = $_GET['serie'];
        $pagina = $_GET['pagina'];
        $paginaSeries = $_GET['pagina_series'];
        if(isset($_GET['pagina_series'])){
            $url_query="&pagina=".$pagina.'&pagina_series='.$_GET['pagina_series'];
        }elseif(isset($_GET['pagina_buscar'])){
            $url_query="&pagina_buscar=".$_GET['pagina_buscar']."&pagina=".$pagina."&consulta=".$_GET['consulta'];
        }else{
            $url_query="&pagina=".$pagina."&consulta=".$_GET['consulta'];
        }
        header("Location: series_modificar_imagen.php?id=".$id."&serie=".$serie.$url_query);
    }
	
	else{
		echo "No se elimino";
		}


?>