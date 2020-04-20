<?php
    session_start();
    if(!isset($_SESSION['u_usuario'])){
        header ("Location: index.php");
    }
?>
