<?php
	session_start();
	
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	
	include("../utils/conexion_tabla.php");
	
	$resultado = $conexion_tabla->query(" SELECT * FROM usuarios_ WHERE usuario='$usuario' LIMIT 1");
	$row=$resultado->fetch_assoc();
	
	if(mysqli_num_rows($resultado)>0 && password_verify($contrasena, $row['contrasena'])==true){
		$_SESSION['u_usuario'] = $usuario;
		$_SESSION['id']=$row['id'];
		$_SESSION['tipo']=0;
		header("Location: sesion.php");
	}
	else{
		$resultado = $conexion_tabla->query(" SELECT * FROM usuariosadmin_ WHERE usuario='$usuario' AND contrasena='$contrasena' LIMIT 1");
		if(mysqli_num_rows($resultado)>0){
			$_SESSION['u_usuario'] = $usuario;
			$_SESSION['tipo']=1;
			header("Location: /php/admin/apartados.php");
		}else{
			include_once 'index.php';
		}
	}
?>