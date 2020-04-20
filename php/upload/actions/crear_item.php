<?php
session_start();

include("../../utils/conexion_tabla.php");

$idUsuario = $_SESSION['id'];
$idSerie = $_POST['idSerie'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$id_origen = $_POST['filename'];
$descripcion_img = $_POST['descripcion_img'];
$descriptores = $_POST['descriptores'];
$personajes = $_POST['personajes'];
$img = $_POST['img'];
$id_origen=$_POST['filename'];

$tipo = "foto";

$query = "SELECT * FROM series WHERE id='$idSerie' AND idUsuario='$idUsuario' LIMIT 1";
$resultado = $conexion_tabla->query($query);

if (mysqli_num_rows($resultado) > 0) {
	$query = "INSERT INTO items (idUsuario,id_origen,idSerie,fecha,lugar,descripcion_img,descriptores,personajes,tipo) VALUES('$idUsuario','$id_origen','$idSerie','$fecha','$lugar','$descripcion_img','$descriptores','$personajes','$tipo')";
	$resultado = $conexion_tabla->query($query);
	if ($resultado) {
		$id=mysqli_insert_id($conexion_tabla);
		$ext=end(explode(".", $id_origen));
		$uploadPath='../../../uploads/'.implode("/", [$idUsuario, $idSerie, $id]).'.jpg';
		if($ext!='jpg' and $ext!='jpeg' and $ext!='JPG' and $ext!='JPEG'){
			$f=imagejpeg(imagecreatefromstring(base64_decode( end(explode(",",$img,2)) )), $uploadPath, 100);
		}else{
			$f=file_put_contents($uploadPath, file_get_contents($img));
		}
		if($f){
			echo "<div id='exito'></div>";
		}else{
			echo "ERROR SUBIENDO ITEM";
		}
	}
} else {
	$resultado = FALSE;
	echo "HUBO UN ERROR";
}
?>

<script>
	let db;
	let dbVersion = 1;
	let dbReady = false;

	window.onload = function() {
		console.log("DOM content loaded");
		initDb();
	}

	function initDb() {
		let request = indexedDB.open("stores", dbVersion);
		request.onerror = function(e) {
			console.error("Unable to open database");
		}
		request.onsuccess = function(e) {
			db = e.target.result;
			console.log("DB opened");
			redirect();
		}
		request.onupgradeneeded = function(e) {
			let db = e.target.result;
			db.createObjectStore("images", {
				keyPath: "id",
				autoIncrement: true
			});
			dbReady = true;
			console.log("Updated")
		}
	}

	function redirect() {
		console.log("Redireccionando");
		let trans = db.transaction(["images"], "readwrite");
		let store = trans.objectStore("images");

		var el = document.getElementById("exito");
		if (el) {
			let req = store.openCursor();
			req.onsuccess = function(e) {
				console.log("Cursor abierto")
				let cursor = e.target.result;
				var request = cursor.delete();
				request.onsuccess = function() {
					console.log("Borrado");
					var request_count = store.count();
					request_count.onsuccess = function() {
						console.log("Datos contados");
						datosCount = request_count.result;
						console.log(datosCount);
						if (datosCount > 0) {
							window.location = "../detallar_item.php?idSerie=" + cursor.value.id_serie;
						} else {
							window.location = "/php/login/sesion.php";
						}
					}

				}
			}
		} else {
			console.log("No se pudo subir");
			let req = store.openCursor();
			req.onsuccess = function(e) {
				let cursor = e.target.result;
				if (cursor) {
					window.location = "../detallar_item.php?idSerie=" + cursor.value.id_serie;
				} else {
					window.location = "/php/login/sesion.php";
				}
			}
		}
	}
</script>