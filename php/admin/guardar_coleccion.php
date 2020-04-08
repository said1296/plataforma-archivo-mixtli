<?php
	session_start();
  
 
	
	
	include("conexion_tabla.php");
	
	$autor = $_POST['autor'];
	$usuario = $_POST['usuario'];
	$grupo = $_POST['grupo'];
	$serie = $_POST['serie'];
	$coleccion = $_POST['coleccion'];
	$fecha = $_POST['fecha'];
	$lugar = $_POST['lugar'];
	$descripcion = $_POST['descripcion'];
	$img1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
	$img2 = addslashes(file_get_contents($_FILES['img2']['tmp_name']));
	$img3 = addslashes(file_get_contents($_FILES['img3']['tmp_name']));
	$img4 = addslashes(file_get_contents($_FILES['img4']['tmp_name']));
	$img5 = addslashes(file_get_contents($_FILES['img5']['tmp_name']));
	$img6 = addslashes(file_get_contents($_FILES['img6']['tmp_name']));
	$img7 = addslashes(file_get_contents($_FILES['img7']['tmp_name']));
	$img8 = addslashes(file_get_contents($_FILES['img8']['tmp_name']));
	$img9 = addslashes(file_get_contents($_FILES['img9']['tmp_name']));
	$img10 = addslashes(file_get_contents($_FILES['img10']['tmp_name']));
	$img11 = addslashes(file_get_contents($_FILES['img11']['tmp_name']));
	$img12 = addslashes(file_get_contents($_FILES['img12']['tmp_name']));
	$img13 = addslashes(file_get_contents($_FILES['img13']['tmp_name']));
	$img14 = addslashes(file_get_contents($_FILES['img14']['tmp_name']));
	$img15 = addslashes(file_get_contents($_FILES['img15']['tmp_name']));
	$img16 = addslashes(file_get_contents($_FILES['img16']['tmp_name']));
	$img17 = addslashes(file_get_contents($_FILES['img17']['tmp_name']));
	$img18 = addslashes(file_get_contents($_FILES['img18']['tmp_name']));
	$img19 = addslashes(file_get_contents($_FILES['img19']['tmp_name']));
	$img20 = addslashes(file_get_contents($_FILES['img20']['tmp_name']));
	$img21 = addslashes(file_get_contents($_FILES['img21']['tmp_name']));
	$img22 = addslashes(file_get_contents($_FILES['img22']['tmp_name']));
	$img23 = addslashes(file_get_contents($_FILES['img23']['tmp_name']));
	$img24 = addslashes(file_get_contents($_FILES['img24']['tmp_name']));
	$img25 = addslashes(file_get_contents($_FILES['img25']['tmp_name']));
	
	$query = "INSERT INTO colecciones (autor,usuario,grupo,serie,coleccion,fecha,lugar,descripcion,img1,img2,img3,img4,img5,img6,img7,img8,img9,img10,img11,img12,img13,img14,img15,img16,img17,img18,img19,img20,img21,img22,img23,img24,img25) VALUES('$autor','$usuario','grupo','$serie','$coleccion','$fecha','$lugar','$descripcion','$img1','$img2','$img3','$img4','$img5','$img6','$img7','$img8','$img9','$img10','$img11','$img12','$img13','$img14','$img15','$img16','$img17','$img18','$img19','$img20','$img21','$img22','$img23','$img24','$img25')";
	$resultado = $conexion_tabla->query($query);
	
	if($resultado){
		
		header ("Location: colecciones.php");
		
		}
	
	else{
		echo "No se inserto";
		
		}



?>