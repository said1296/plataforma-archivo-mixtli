<?php
	session_start();
	
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	
	include("../utils/conexion_tabla.php");
	
	$resultado = $conexion_tabla->query(" SELECT * FROM usuariosadmin_ WHERE usuario='$usuario' AND contrasena='$contrasena'");
	
	if(mysqli_num_rows($resultado)>0){
		$_SESSION['u_usuario'] = $usuario;
		$_SESSION['tipo']= 1;
		header("Location: apartados.php");
	}
	else{
		$errorLogin = "Nombre de usuario y/o contraseña incorrecta";
		include_once 'index.php';
	}
?>