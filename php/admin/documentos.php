<?php
  session_start();
  
  include("conexion_usuario.php");
  
  if(isset($_SESSION['u_usuario'])){
	  $proceso = $conexionUsuario->query(" SELECT * FROM usuariosadmin_ WHERE usuario='$usuario' AND contrasena='$contrasena'");
	
		if($resultado = mysqli_fetch_array($proceso)){
			$_SESSION['u_usuario'] = $usuario;
			$usuario = null;

    		if (count($resultado) > 0) {
      			$usuario = $resultado;
    		}
		}
	  
	  
  // echo "sesión exitosa";
  // echo "<a href='cerrar_sesion.php'>Cerrar Sesión</a> ";
  
  }
   else{
		header ("Location: index.php");
   }
				   
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Documentos | Preservación Digital Comunitaria</title>
   <?php
      include("../includes/head.php");
   ?>
 </head>
  
 <body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">
  
  <div class="loader-mask">
   <div class="loader">
    "Cargando..."
   </div>
  </div>
  
  <?php
		include('../includes/header.php')
	?>
  
  <!--- WRAPP --->
  <div class="main-wrapper oh">
  
   <section class="page-title style-2 text-center">
    <div class="container relative clearfix">
	 <div class="title-holder">
	  <div class="title-text">
	   <h1 class="uppercase">Documentos</h1>
	   <ol class="breadcrumb">
		<li> Bienvenido <?php echo "&nbsp;" . $_SESSION['u_usuario']; ?> </li>
	   </ol>
	  </div>
	 </div>
	</div>
   </section>
	
   
   <section class="section-wrap" id="colections">
    <div class="container">
	 
     <div class="row">
      <div class="col-sm-6">
       <a href="subir_documento.php" class="btn btn-md btn-stroke">Agregar nuevo documento</a>
      </div>
      <div class="col-sm-6 text-right">
       <a href="apartados.php" class="btn btn-md btn-dark">
	    <?php echo "Regresar";
		?>
       </a>
      </div>
     </div>
     <br />
     
     
    <div class="container">
     <div class="row">
      <br />
      <table class="table table-striped">
       <tbody>
       
       <thead>
       <tr>
        <th class="col-md-2"> <h5 class="widget-title">Documento</h5></th>
        <th class="col-md-2"> <h5 class="widget-title">Imagen</h5></th>
        <th class="col-md-1"> <h5 class="widget-title">Año</h5></th>
        <th class="col-md-3"> <h5 class="widget-title">Link</h5></th>
        <th colspan="2" class="col-md-2"> <h5 class="widget-title">Operaciones</h5></th>
       </tr> 
       </thead> 
       
       <?php
		  include("../includes/conexion_tabla.php");
		  //include_once 'fotografias.php';
		 
		  // cantidad de registros por pagina
		  $por_Pagina = 10;
		  
		   if(isset($_GET['pagina'])){
		 	  $pagina = $_GET['pagina'];
		   }else{
			  $pagina = 1;
		    }
			
		  //la página inicia en 0 y se multiplica $por_Pagina
		  $empieza = ($pagina - 1) * $por_Pagina;
		  
		  //seleccionar los registros de la tabla gestion_imagen con LIMIT
		  $query = "SELECT * FROM documentos ORDER BY id desc LIMIT $empieza, $por_Pagina ";
		  
		  //$resultado = mysqli_query($conexion_tabla, $query);
		  //$query = "SELECT * FROM gestion_imagen";
		  $resultado = $conexion_tabla->query($query);
		    while($row = $resultado->fetch_assoc()){
				
				
       ?>
           
       <tr>
        <td class="col-md-2"> <?php echo $row['documento']; ?></td>
        <td class="col-md-2" style=" width:120px; height:100px"> <img height="100px" width="120px" src="data:image/jpg;base64,<?php echo base64_encode($row['imgD']);  ?>"/> <br /><br /></td>
        <td class="col-md-1"> <?php echo $row['ano']; ?></td>
        <td class="col-md-3"> <?php echo $row['link']; ?></td>
        <td class="col-md-1"> <a href="modificar_documento.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark"> Modificar </a> </td>
        <td class="col-md-1"> <a href="eliminar_documento.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-red">Eliminar</a></td>
       </tr>
       
       <?php
		 // end while;
		 }
	   ?>
       
       </tbody>
      </table>
      
      <div>
       <?php
		// seleccionar todo
		$query = "SELECT * FROM documentos";
		$resultado = $conexion_tabla->query($query);
		//$resultado = mysqli_query($conexion_tabla, $query);
					
		//contar el total de registros
		$totalRegistros = mysqli_num_rows($resultado);
					
		//usando ciel para dividir el total de resgitros
		$totalPaginas = ceil($totalRegistros / $por_Pagina);
					
		// link a la primera página
		echo "<ul>";
		echo "<li class='btn btn-md btn-light'><a href='documentos.php?pagina=1'>".'Primera '."</a></li>";
					
		for($i=1; $i<=$totalPaginas; $i++){
			echo "<li class='btn btn-md btn-light'><a href='documentos.php?pagina=".$i."'>".$i."</a></li>";
			}
		// link a la ultima página
		echo "<li class='btn btn-md btn-light'><a  href='documentos.php?pagina=$totalPaginas'>".'Última '."</a></li>";
		echo "</ul>";
	   ?>
      </div>
      
     </div>
    </div>
     
     
    </div>
   </section>
   
   
   <section class="call-to-action bg-light">
	<div class="container">
	 <div class="row">
	  <div class="col-sm-9 col-xs-12">		
	   <h2 class="mb-0">Consulta virtual de imágenes digitales que contribuye al conocimiento de nuestra cultura.</h2>
	  </div>
	  <div class="col-sm-3 col-xs-12 cta-button">
	   
	  </div>
     </div>
	</div>
   </section>
   
   <!--- FOOTER --->
   <footer class="footer footer-type-1">
    <div class="bottom-footer">
	 <div class="container">
	  <div class="row">
      
       <div class="col-sm-6 copyright">
	    <span> © 2019 Archivo Mixtli  |  por <a href="https://www.facebook.com/sociedaddeexperimentacion/" target="_blank" >Sociedad de experimentación</a> </span>
	   </div>
       
       <div class="col-sm-4 col-sm-offset-2 footer-socials mt-mdm-10">
	    <div class="social-icons text-right">
		 <img src="../../themes/img/gral/fonca.png" />									
		</div>
	   </div>

      </div>
	 </div>
	</div> 
   </footer>
   <!--- END FOOTER --->

   <div id="back-to-top">
	<a href="#top"><i class="fa fa-angle-up"></i></a>
   </div>

  </div>
  <!--- END WRAPP --->
  
  <script type="text/javascript" src="../../themes/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../themes/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../themes/js/plugins.js"></script>
  <script type="text/javascript" src="../../themes/js/jquery.themepunch.tools.min.js"></script>
  <script type="text/javascript" src="../../themes/js/jquery.themepunch.revolution.min.js"></script>
  <script type="text/javascript" src="../../themes/js/rev-slider.js"></script>
  <script type="text/javascript" src="../../themes/js/scripts.js"></script>
 
 </body>
</html>