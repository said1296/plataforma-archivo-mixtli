<?php

 $conexion = mysqli_connect("localhost","arc38mix74_archivoMixtli","Pr3s3rv4d1g1t4l","arc38mix74_preservacion");
 $serie = $_POST['serie'];
 
 $sql="SELECT id,
 		id_grupo,
		serie
		from serieDeGrupos
		where id_grupo = '$serie'";
		
 $result = mysqli_query($conexion,$sql);
 $cadena = "<label>Selecciona la serie </label>
 		 <select id='serie' name'serie' >";
 
 while ($ver=mysqli_fech_row($result)) {
	$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
 }
 
 echo $cadena."</select>";

?>