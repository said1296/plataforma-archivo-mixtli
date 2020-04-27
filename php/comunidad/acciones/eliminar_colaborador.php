<?php
session_start();
include("../../utils/conexion_tabla.php");

$idUsuario = $_REQUEST['idUsuario'];

if ($_SESSION['tipo'] == 1) {
    $path = "../../../uploads/$idUsuario";
    if (rrmdir($path)) {
        $query="DELETE items, series, historias, historias_items, usuarios_, descripciones, comentarios_series, comentarios_items
        FROM usuarios_
        LEFT JOIN series ON series.idUsuario=usuarios_.id
        LEFT JOIN comentarios_series ON comentarios_series.idSerie=series.id
        LEFT JOIN items ON items.idSerie=series.id
        LEFT JOIN comentarios_items ON comentarios_items.idItem=items.id
        LEFT JOIN descripciones ON descripciones.idItem=items.id
        LEFT JOIN historias ON historias.idUsuario=usuarios_.id
        LEFT JOIN historias_items ON historias_items.idHistoria=historias.id
        WHERE usuarios_.id=$idUsuario";
        
        $resultado = $conexion_tabla->query($query);

        if (mysqli_affected_rows($conexion_tabla) > 0) {
            echo "<script> window.history.go(-1) </script>";
        } else {
            echo "ERROR ELIMINANDO USUARIO DE LA BASE";
        }
    }else{
        echo "ERROR ELIMINANDO ARCHIVOS DEL SERVIDOR";
    }
} else {
    echo "ERROR CON LOS PERMISOS.";
}

function rrmdir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object)) {
                    rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                } else {
                    unlink($dir . DIRECTORY_SEPARATOR . $object) or print_r(error_get_last());
                }
            }
        }
        if (rmdir($dir)) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}
