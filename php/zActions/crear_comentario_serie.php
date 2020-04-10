<?php
include('../zUtils/conexion_tabla.php');

$ItemID = $_POST['ItemID'];
$Usuario = $_POST['Usuario'];
$Comentario = $_POST['Comentario'];
echo "AAAAAAAAaa".$ItemID.$Usuario.$Comentario;

$query = "INSERT INTO comentarios_series (ItemID,Usuario,Comentario) VALUES('$ItemID','$Usuario','$Comentario')";
$resultado = $conexion_tabla->query($query);

if(mysqli_affected_rows($conexion_tabla)>0){
	echo "<script> window.location.replace(document.referrer); </script>";
}
else{
	echo "<h1>No se creo</h1><br /> <br />";
	echo "<h1>".mysqli_error($conexion_tabla)."</h1>";
}