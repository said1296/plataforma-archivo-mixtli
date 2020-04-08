<?php

	$conexion_tabla = new mysqli("localhost","arc38mix74_archivoMixtli","Pr3s3rv4d1g1t4l","arc38mix74_preservacion");
	
	$conexion_tabla -> set_charset("utf8");
	if(!$conexion_tabla){
		echo "conexion no exitosa";
	}


?>