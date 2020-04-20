<?php
session_start();
include('../../utils/conexion_tabla.php');
$id = $_POST['id'];
$query = "SELECT * from items WHERE id='$id' LIMIT 1";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();
if ($_SESSION['id'] != $row['idUsuario'] and $_SESSION['tipo'] != 1) {
    header("Location: /php/login/index.php");
    exit;
}

$id = $_POST['id'];
$descriptores = $_POST['descriptores'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$descripcion_img = $_POST['descripcion_img'];
$personajes = $_POST['personajes'];
$query = "UPDATE items SET descriptores='$descriptores', fecha='$fecha', lugar='$lugar', descripcion_img='$descripcion_img', personajes='$personajes' WHERE id='$id'";
$resultado = $conexion_tabla->query($query);

$i = 0;
foreach ($_POST as $key => $value) {
    if ($i > 7) {
        $id = explode("-", $key)[1];
        $query = "UPDATE descripciones SET descripcion='$value' WHERE id='$id'";
        $resultado = $conexion_tabla->query($query);
    }
    $i = $i + 1;
    continue;
}

echo "<script> window.history.go(-2) </script>";