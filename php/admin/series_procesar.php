<?php
include("conexion_tabla.php");
$tipo=$_GET['tipo'];

if($tipo=="colecciones"){
    $id = $_POST['id'];
    $descriptores = $_POST['descriptores'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $descripcion_img = $_POST['descripcion_img'];
    $personajes=$_POST['personajes'];
    $query="UPDATE $tipo SET descriptores='$descriptores', fecha='$fecha', lugar='$lugar', descripcion_img='$descripcion_img', personajes='$personajes' WHERE id='$id'";
    $resultado = $conexion_tabla->query($query);

    $i=0;
    foreach($_POST as $key => $value){
        if($i>7){
            $DescripcionID=explode("-",$key)[1];
            $query="UPDATE descripciones SET Descripcion='$value' WHERE DescripcionID='$DescripcionID'";
            $resultado = $conexion_tabla->query($query);
        }
        $i=$i+1;
        continue;
    }

    $serie = $_POST['serie'];
    $pagina = $_GET['pagina'];
    $paginaSeries = $_GET['pagina_series'];

    if(isset($_POST['query'])){
        $url_query=$_POST['query'];
    }else{
        parse_str($_SERVER['QUERY_STRING'],$queryArray);
        unset($queryArray['DescripcionID']);
        $url_query = http_build_query($queryArray);
    }

    header("Location: series_modificar_imagen.php?".$url_query);
}
if($tipo=="series"){
    $id=$_POST['id'];    
    $grupo = $_POST['grupo'];
    $serie = $_POST['serie'];
    $descripcion_serie = $_POST['descripcion_serie'];
    if($_FILES['imgSerie']['tmp_name'] ){
        $imgSerie = addslashes(file_get_contents($_FILES['imgSerie']['tmp_name']));      
    }else{
        $query = "UPDATE $tipo SET grupo='$grupo', serie='$serie',descripcion_serie='$descripcion_serie' WHERE id='$id'";
    }
    $resultado = $conexion_tabla->query($query);
    $url_query=$_POST['query'];
    header("Location: series_modificar_serie.php?".$url_query);
}

?>