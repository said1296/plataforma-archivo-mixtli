<?php
  session_start();
  
  include("conexion_usuario.php");
  
  if(isset($_SESSION['u_usuario'])){
     $usuario = $_SESSION['u_usuario'];
     $proceso = $conexionUsuario->query(" SELECT * FROM usuariosadmin_ WHERE usuario='$usuario'");
     $resultado = mysqli_fetch_array($proceso);
	
		if($resultado){
			$_SESSION['u_usuario'] = $usuario;
			$usuario = null;

    		if (count($resultado) > 0) {
               $usuario = $resultado;
    		}
      }else{
         header ("Location: index.php");
      }
   }else{
      header ("Location: index.php");
   }
				   
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Historias | Preservación Digital Comunitaria</title>
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
	   <h1 class="uppercase">Historias</h1>
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
       <a href="subir_historia.php" class="btn btn-md btn-stroke">Agregar nueva historia</a>
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
        <th class="col-md-2"> <h5 class="widget-title">Autor</h5></th>
        <th class="col-md-2"> <h5 class="widget-title">Título</h5></th>
        <th class="col-md-1"> <h5 class="widget-title">Fecha</h5></th>
       </tr> 
       </thead> 
       
       <?php
		  include("conexion_tabla.php");
		  //include_once 'fotografias.php';
		  
		   if(isset($_GET['pagina'])){
		 	  $pagina = $_GET['pagina'];
		   }else{
			  $pagina = 1;
		    }
         
          
		  // cantidad de registros por pagina
		  $por_Pagina = 10;
		  //la página inicia en 0 y se multiplica $por_Pagina
        $empieza = ($pagina - 1)*$por_Pagina;
        //contar el total de registros
        $query = "SELECT COUNT(*) as total FROM historias";
        $resultado=$conexion_tabla->query($query);
        $data=$resultado->fetch_assoc();
        $totalRegistros=$data['total'];
		  
		  //seleccionar los registros de la tabla gestion_imagen con LIMIT
		  $query = "SELECT * FROM historias ORDER BY id desc LIMIT $empieza, $por_Pagina ";
		  
		  //$resultado = mysqli_query($conexion_tabla, $query);
		  //$query = "SELECT * FROM gestion_imagen";
		  $resultado = $conexion_tabla->query($query);
		    while($row = $resultado->fetch_assoc()){
				
				
       ?>
           
       <tr>
        <td class="col-md-2"> <?php echo $row['autor']; ?></td>
        <td class="col-md-2"> <?php echo $row['titulo'];  ?></td>
        <td class="col-md-1"> <?php echo $row['fecha']; ?></td>
        <td class="col-md-1"> <a href="modificar_historia.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark"> Modificar </a> </td>
        <td class="col-md-1"> <a href="historias_imagenes_modificar.php?id_historia=<?php echo $row['id']; ?>" class="btn btn-sm btn-blue"> Imágenes </a> </td>
        <td class="col-md-2"> <a href="historia_del_mes.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-light"> Historia del mes </a> </td>
        <td class="col-md-1"> <a href="eliminar_historia.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-red">Eliminar</a></td>
       </tr>
       
       <?php
		 // end while;
		 }
	   ?>
       
       </tbody>
      </table>
      
      <div>
		<?php
			$totalPaginas = ceil($totalRegistros / $por_Pagina);
			$ref=$_SERVER['PHP_SELF'];

			echo "<ul class='carrusel'>";
			parse_str($_SERVER['QUERY_STRING'],$queryArray);
			$queryArray['pagina']=1;
			$queryString=http_build_query($queryArray);
			echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>Primera</a></li>";
		
			$por_carrusel=9;
			if($totalPaginas > $por_carrusel){
				for($i=1; $i<=$por_carrusel; $i++){

					if($pagina>ceil(($por_carrusel/2)+1) and $pagina<=($totalPaginas-floor($por_carrusel/2))){
					$empieza_carrusel = $pagina-ceil($por_carrusel/2);
					$numero_carrusel = $empieza_carrusel + $i;
					}
					elseif($pagina>=($totalPaginas-floor($por_carrusel/2))){
					$empieza_carrusel = $totalPaginas-$por_carrusel;
					$numero_carrusel = $empieza_carrusel + $i;
					}
					else{
					$numero_carrusel=$i;
					}

					parse_str($_SERVER['QUERY_STRING'],$queryArray);
					$queryArray['pagina']=$numero_carrusel;
					$queryString=http_build_query($queryArray);
					echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$numero_carrusel</a></li>";
				}
			}
			else{
				for($i=1; $i<=$totalPaginas; $i++){
					parse_str($_SERVER['QUERY_STRING'],$queryArray);
					$queryArray['pagina']=$i;
					$queryString=http_build_query($queryArray);
					echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$i</a></li>";
				}
			}

			// link a la ultima página
			parse_str($_SERVER['QUERY_STRING'],$queryArray);
			$queryArray['pagina']=$totalPaginas;
			$queryString=http_build_query($queryArray);
			echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>Última</a></li>";
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