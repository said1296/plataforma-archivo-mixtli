<?php
	session_start();
	
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	
	include("conexion_usuario.php");
	
	$resultado = $conexionUsuario->query(" SELECT * FROM usuarios_ WHERE usuario='$usuario' AND contrasena='$contrasena'");
	
	if(mysqli_num_rows($resultado)>0){
		$_SESSION['u_usuario'] = $usuario;
		header("Location: sesion.php");
	}
	else{
		$errorLogin = "Nombre de usuario y/o contraseña incorrecta";
		include_once 'index.php';
	}
?>