<?php

	session_start();
	
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	
	include("conexion_usuario.php");
	
	$proceso = $conexionUsuario->query(" SELECT * FROM usuariosadmin_ WHERE usuario='$usuario' AND contrasena='$contrasena'");
	
		if($resultado = mysqli_fetch_array($proceso)){
			$_SESSION['u_usuario'] = $usuario;
			header("Location: apartados.php");
			}
		else{
			$errorLogin = "Nombre de usuario y/o contraseña incorrecta";
			//header("Location: index.php");
			include_once 'index.php';
			}

?>