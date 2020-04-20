<?php
session_start();

include("../../utils/conexion_tabla.php");

$coleccion = $_POST['coleccion'];
$idUsuario = $_SESSION['id'];
$grupo = $_POST['grupo'];
$serie = $_POST['serie'];
$descripcion_serie = $_POST['descripcion_serie'];
$imgSerie = file_get_contents($_FILES['imgSerie']['tmp_name']);
$filename=$_FILES['imgSerie']['name'];

echo $filename;

$query = "INSERT INTO series (coleccion,idUsuario,grupo,serie,descripcion_serie) VALUES('$coleccion','$idUsuario','$grupo','$serie','$descripcion_serie')";
$resultado=$conexion_tabla->query($query);

if ($resultado){
	$idSerie=mysqli_insert_id($conexion_tabla);
	$uploadDir='../../../uploads/'.implode("/", [$idUsuario, $idSerie]);
	mkdir($uploadDir);
	$uploadPath=$uploadDir."/0.jpg";
	echo $uploadPath;
	$ext=end(explode(".", $filename));
	if($ext!='jpg' and $ext!='jpeg' and $ext!='JPG' and $ext!='JPEG'){
		$f=imagejpeg(imagecreatefromstring($imgSerie), $uploadPath, 100);
	}else{
		$f=file_put_contents($uploadPath, $imgSerie);
	}
	if($f){
		header("Location: ../añadir_item.php?idSerie=".$idSerie);
	}else{
		echo "ERROR SUBIENDO IMAGEN";
	}
} else {
	echo "No se inserto";
}
