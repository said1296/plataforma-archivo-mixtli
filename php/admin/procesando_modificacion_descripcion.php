<?php
	
	include("../includes/conexion_tabla.php");
	
    $campo = $_REQUEST['campo'];
    if($_GET['id']){
        $id = $_GET['id'];
        $query="DELETE FROM proyecto WHERE id='$id'";
        $resultado=$conexion_tabla->query($query);
    } elseif($campo=="imagen"){
        $uploaddir = '../../themes/img/sections/proyecto/';
        $uploadfile = $uploaddir.basename($_FILES['proyecto-img']['name']);
        echo $_FILES['proyecto-img']['tmp_name'];
        if(is_writable($uploaddir)){
            echo "SI SE PUEDE ESCRIBIR ";
        }else{
            echo "NO SE PUEDE ESCRIBIR ";
        }
        if (move_uploaded_file($_FILES['proyecto-img']['tmp_name'], $uploadfile)) {
            $query = "UPDATE proyecto SET valor='$uploadfile' WHERE campo='$campo'";
            $resultado = $conexion_tabla->query($query);

            $files = glob('../../themes/img/sections/proyecto/*'); // get all file names
            foreach($files as $file){ // iterate files
              if(is_file($file) and $file!=$uploadfile)
                unlink($file); // delete file
            }
        }

    } elseif($campo=="descripcion"){
        $descripcion = $_POST['descripcion'];
        $query = "UPDATE proyecto SET valor='$descripcion' WHERE campo='$campo'";
        $resultado = $conexion_tabla->query($query);
    } elseif($campo=="condiciones"){
        $condiciones = $_POST['condiciones'];
        $query = "UPDATE proyecto SET valor='$condiciones' WHERE campo='$campo'";
        $resultado = $conexion_tabla->query($query);
    } elseif($campo=="aviso"){
        $aviso = $_POST['aviso'];
        $query = "UPDATE proyecto SET valor='$aviso' WHERE campo='$campo'";
        $resultado = $conexion_tabla->query($query);
    } elseif($campo=="objetivo"){
        $totalObjetivos=count($_POST)/2;
        for($i=1;$i<=$totalObjetivos;$i++){
            $posicion=$_POST['posicion-'.$i];
            $valor=$_POST['valor-'.$i];
            $query="SELECT * FROM proyecto WHERE posicion='$posicion' and campo='$campo'";
            $resultado = $conexion_tabla->query($query);
            if(mysqli_num_rows($resultado)>0){
                echo("UPDATEANDO ");
                $query = "UPDATE proyecto SET valor='$valor' WHERE campo='$campo' and posicion='$posicion'";
                $resultado = $conexion_tabla->query($query);
            }else{
                echo($posicion." ".$valor."\br");
                $query = "INSERT INTO proyecto (posicion, valor, campo) VALUES ('$posicion','$valor', '$campo')";
                $resultado = $conexion_tabla->query($query);
            }
        }
    } elseif($campo=="preservacion"){
        $totalObjetivos=count($_POST)/2;
        for($i=1;$i<=$totalObjetivos;$i++){
            $posicion=$_POST['posicion-'.$i];
            $valor=$_POST['valor-'.$i];
            $query="SELECT * FROM proyecto WHERE posicion='$posicion' and campo='$campo'";
            $resultado = $conexion_tabla->query($query);
            if(mysqli_num_rows($resultado)>0){
                echo("UPDATEANDO ");
                $query = "UPDATE proyecto SET valor='$valor' WHERE campo='$campo' and posicion='$posicion'";
                $resultado = $conexion_tabla->query($query);
            }else{
                echo($posicion." ".$valor."\br");
                $query = "INSERT INTO proyecto (posicion, valor, campo) VALUES ('$posicion','$valor', '$campo')";
                $resultado = $conexion_tabla->query($query);
            }
        }
    } elseif($campo=="faq"){
        $totalObjetivos=count($_POST)/3;
        for($i=1;$i<=$totalObjetivos;$i++){
            $posicion=$_POST['posicion-'.$i];
            $valor=$_POST['valor-'.$i];
            $respuesta=$_POST['respuesta-'.$i];
            $query="SELECT * FROM proyecto WHERE posicion='$posicion' and campo='$campo'";
            $resultado = $conexion_tabla->query($query);
            if(mysqli_num_rows($resultado)>0){
                echo("UPDATEANDO ");
                $query = "UPDATE proyecto SET valor='$valor', respuesta='$respuesta' WHERE campo='$campo' and posicion='$posicion'";
                $resultado = $conexion_tabla->query($query);
            }else{
                echo($posicion." ".$valor."\br");
                $query = "INSERT INTO proyecto (posicion, valor, campo, respuesta) VALUES ('$posicion','$valor', '$campo', '$respuesta')";
                $resultado = $conexion_tabla->query($query);
            }
        }
    }
	
	if($resultado or mysqli_affected_rows($conexion_tabla)!=0){
		echo "se completó";
		header ("Location: descripcion.php#");

		}
	
	else{
		echo "No se modifico";
		
		}



?>