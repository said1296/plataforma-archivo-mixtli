<?php
	
	include("../includes/conexion_tabla.php");
	
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
	$imagenUser = addslashes(file_get_contents($_FILES['imagenUser']['tmp_name']));
	
	$coleccion = $_POST['coleccion'];
	$img1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
	
	
	$query = "INSERT INTO usuarios_(autor,usuario,contrasena,email,ocupacion,soy,origen,residencia,edad,genero,imagenUser,coleccion,img1) VALUES('$autor','$usuario','$contrasena','$email','$ocupacion','$soy','$origen','$residencia','$edad','$genero','$imagenUser','$coleccion','$img1')";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: https://archivomixtli.mx/php/login/sesion.php");
		
		
		}
	
	else{
		$errorLogin = "Ocurrio un error no se inserto";
		
		}



?>