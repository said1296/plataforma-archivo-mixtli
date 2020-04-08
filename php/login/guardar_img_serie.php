<?php
	session_start();
  
 	include("conexion_tabla.php");
	
	$coleccion = $_POST['coleccion'];
	$autor = $_POST['autor'];
	$usuario = $_SESSION['u_usuario'];
	$grupo = $_POST['grupo'];
	$serie = $_POST['serie'];
	$descripcion_serie = $_POST['descripcion_serie'];
	
	$fecha = $_POST['fecha'];
	$lugar = $_POST['lugar'];
	$descripcion_img = $_POST['descripcion_img'];
	$descriptores = $_POST['descriptores'];
	$personajes = $_POST['personajes'];
	
	
	$img = addslashes(file_get_contents($_POST['img']));
	$tipo = "foto";

	$query = "SELECT * FROM series WHERE usuario='$usuario' AND coleccion ='$coleccion'";
	$resultado = $conexion_tabla->query($query);

	if(mysqli_num_rows($resultado)>0){
		$query = "INSERT INTO colecciones (coleccion,autor,usuario,grupo,serie,descripcion_serie,fecha,lugar,descripcion_img,descriptores,personajes,img, tipo) VALUES('$coleccion','$autor','$usuario','$grupo','$serie','$descripcion_serie','$fecha','$lugar','$descripcion_img','$descriptores','$personajes','$img', '$tipo')";
		$resultado = $conexion_tabla->query($query);
		if($resultado){
			echo "<div id='exito'></div>";
		}
	}
	else{
		$resultado=FALSE;
		echo "HUBO UN ERROR";
	}
?>

<script>

	let db;
	let dbVersion = 1;
	let dbReady = false;

	window.onload = function(){
		console.log("DOM content loaded");
		initDb();
	}

	function initDb(){
		let request = indexedDB.open("stores", dbVersion);
		request.onerror = function(e){
			console.error("Unable to open database");
		}
		request.onsuccess = function(e){
			db = e.target.result;
			console.log("DB opened");
			redirect();
		}
		request.onupgradeneeded = function(e){
			let db = e.target.result;
			db.createObjectStore("images", {keyPath:"id", autoIncrement: true});
			dbReady = true;
			console.log("Updated")
		}
	}

	function redirect(){
		console.log("Redireccionando");
		let trans = db.transaction(["images"], "readwrite");
		let store = trans.objectStore("images");

		var el = document.getElementById("exito");
		if(el){
			let req = store.openCursor();
			req.onsuccess = function(e){
				console.log("Cursor abierto")
				let cursor = e.target.result;
				var request = cursor.delete();
				request.onsuccess = function(){
					console.log("Borrado");
					var request_count = store.count();
					request_count.onsuccess = function(){
						console.log("Datos contados");
						datosCount = request_count.result;
						console.log(datosCount);
						if(datosCount>0){
							window.location="alimentar_imagen.php?id=" + cursor.value.id_serie;
						}else{
							window.location="sesion.php";
						}
					}

				}
			}
		}else{
			console.log("No se pudo subir");
			let req = store.openCursor();
			req.onsuccess = function(e){
				let cursor = e.target.result;
				if(cursor){
					window.location = "alimentar_imagen.php?id=" + cursor.value.id_serie;
				}else{
					window.location="sesion.php";
				}
			}
		}
	}
</script>