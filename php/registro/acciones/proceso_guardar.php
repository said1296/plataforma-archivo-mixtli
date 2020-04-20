<?php

include("../../utils/conexion_tabla.php");

$autor = $_POST['autor'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$email = $_POST['email'];
$ocupacion = $_POST['ocupacion'];
$soy = $_POST['soy'];
$origen = $_POST['origen'];
$residencia = $_POST['residencia'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$coleccion = $_POST['coleccion'];

$imagenUser = file_get_contents($_FILES['imagenUser']['tmp_name']);
$filenameUser = $_FILES['imagenUser']['name'];
$imagenColeccion = file_get_contents($_FILES['img1']['tmp_name']);
$filenameColeccion = $_FILES['img1']['name'];


$query = "INSERT INTO usuarios_(autor,usuario,contrasena,email,ocupacion,soy,origen,residencia,edad,genero,coleccion) VALUES('$autor','$usuario','$contrasena','$email','$ocupacion','$soy','$origen','$residencia','$edad','$genero','$coleccion')";
$resultado = $conexion_tabla->query($query) or die(mysqli_error($conexion_tabla));

if (mysqli_affected_rows($conexion_tabla)>0) {
	$idUsuario = mysqli_insert_id($conexion_tabla);
	$uploadDir = "../../../uploads/".$idUsuario;
	mkdir($uploadDir);
	$uploadPath = $uploadDir."/0.jpg";
	$ext = end(explode(".", $filenameUser));
	if ($ext != 'jpg' and $ext != 'jpeg' and $ext != 'JPG' and $ext != 'JPEG') {
		$f = imagejpeg(imagecreatefromstring($imagenUser), $uploadPath, 100 or print_r(error_get_last()));
	} else {
		$f = file_put_contents($uploadPath, $imagenUser) or print_r(error_get_last());
	}
	if ($f) {
		$uploadPath = $uploadDir . "/1.jpg";
		$ext = end(explode(".", $filenameColeccion));
		if ($ext != 'jpg' and $ext != 'jpeg' and $ext != 'JPG' and $ext != 'JPEG') {
			$f = imagejpeg(imagecreatefromstring($imagenColeccion), $uploadPath, 100) or print_r(error_get_last());
		} else {
			$f = file_put_contents($uploadPath, $imagenColeccion);
		}
		if ($f) {
			header("Location: ../../login/index.php");
		} else {
			echo "ERROR SUBIENDO IMAGEN DE COLECCION";
		}
	} else {
		echo "ERROR SUBIENDO IMAGEN DE USUARIO";
	}
} else {
	echo "OCURRIÓ UN ERROR INSERTANDO A BASE DE DATOS";
}
