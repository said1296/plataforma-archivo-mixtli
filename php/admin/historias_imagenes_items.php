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
   }
   else{
		header ("Location: index.php");
   }
				   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  
  <?php
      $serie = $_GET['serie'];
      $paginaSeries=$_GET['pagina_series'];
         
      include("conexion_tabla.php");
         
      $query = "SELECT * FROM series WHERE serie='$serie'";
      $resultado = $conexion_tabla->query($query);
      $row_serie = $resultado->fetch_assoc();	
	     	
  ?>
  <title>Serie <?php echo $row_serie['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>

  
  <meta property="og:title" content="Serie <?php echo $row_serie['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen" />
  <meta property="og:description" content="Descripción de la página" />
  <meta property="og:image" content="http://.jpg" />      
  <meta property="og:url" content="http://" />

   <?php
      include("../includes/head.php");
   ?>
 </head>
  
 <body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">
  

  
   <?php
		include('../includes/header.php')
	?>
  
  <!--- WRAPP --->
<div class="main-wrapper oh">
   <section class="page-title text-center" style="background-image: url(data:image/jpg;base64,<?php echo base64_encode($row_serie['imgSerie']);  ?>)">
      <div class="container relative clearfix">
         <div class="title-holder">
            <div class="title-text">
               <ol class="breadcrumb"><li> <a>Colección</a> </li></ol>
            <h1 class="uppercase"><?php echo $row_serie['coleccion']; ?></h1>
            </div>
         </div>
      </div>
   </section>
   
   <section class="section-wrap">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <a href="<?php
                     $ref=$_GET['ref'];
                     parse_str($_SERVER['QUERY_STRING'],$queryArray);
                     unset($queryArray['serie']);
                     unset($queryArray['ref']);
                     $queryString=http_build_query($queryArray);
                     echo $ref."?".$queryString;
                  ?>"><li class="btn btn-sm btn-dark">Regresar</li></a>
               <h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0 mt-30"><?php echo $row_serie['coleccion']; ?></h2>
               <p>
               <i class="bg-success text-success">&nbsp;Autor: &nbsp;</i> 
               <?php echo $row_serie['autor']; ?> <br />
               <i class="bg-success text-success">&nbsp;Grupo: &nbsp;</i> 
               <?php echo $row_serie['grupo']; ?> <br />
               <i class="bg-success text-success">&nbsp;Serie: &nbsp;</i> 
               <?php echo $row_serie['serie']; ?> <br />
               </p>
            </div>
         </div>
      </div>
      
      <div class="container">
         <div class="row recent-posts">
         <br><br>
            <div id="portfolio-container" class="works-grid small-gutter with-title">
               
               <?php          
               
               $por_Pagina = 20;

					if(isset($_GET['pagina'])){
						$pagina = $_GET['pagina'];
					}else{
					   $pagina = 1;
					}

					$empieza = ($pagina-1) * $por_Pagina;

					//Contar total de resultados para dividir en páginas
					$query = "SELECT * FROM colecciones WHERE serie='$serie'";
					$resultado = $conexion_tabla->query($query);
					$totalRegistros = mysqli_num_rows($resultado);

					//Seleccionar registros a buscar en la página actual
					$query = "SELECT * FROM colecciones WHERE serie='$serie' LIMIT $empieza, $por_Pagina";
               
               $resultado = $conexion_tabla->query($query);
               while($row = $resultado->fetch_assoc()){
               ?>
            

               <div class="col-md-3 col-sm-6 col-xs-12 work-item">
                  <div class="work-container">
                     <div class="work-img">
                        <?php
                        if($row['tipo']=="foto"){
                           echo '<img src="data:image/jpg;base64,'.base64_encode($row['img']).'" alt="">';
                        }elseif($row['tipo']=="video"){
                           $url=$row['link'];
                           if(strpos($url,"youtube")){
                              parse_str( parse_url( $url, PHP_URL_QUERY ), $url_vars );
                              $video_id = $url_vars['v'];
                              echo '<img src="http://img.youtube.com/vi/'.$video_id.'/hqdefault.jpg" alt="">';
                           }elseif(strpos($url,"archive")){
                              $url=explode("/",$url);
                              echo '<img src="https://archive.org/services/img/'.end($url).'" alt="">';
                           }
                        }else{
                           if($row['link']){
                              $url=$row['link'];
                              if(strpos($url,"soundcloud")){
                                 echo '<img src="../../themes/img/misc/soundcloud.png" alt="">';
                              }else{
                                 echo '<img src="../../themes/img/misc/audio_icon.jpg" alt="">';
										}
                           }else{
                              echo '<img src="../../themes/img/misc/audio_icon.jpg" alt="">';
                           }
                        }
                        ?>
                        <div class="work-overlay">
                           <a style="width:180px;" href="<?php
                              parse_str($_SERVER['QUERY_STRING'],$queryArray);
                              $queryArray['id']=$row['id'];
                              $queryArray['ref_prev']=$queryArray['ref'];
                              $queryArray['ref']=$_SERVER['PHP_SELF'];
                              $queryString=http_build_query($queryArray);
                              echo "historias_detalles.php?".$queryString;
                              ?>" class="btn btn-lg btn-black">Detalles</a>
                           <a style="width:180px;" href="<?php
                              parse_str($_SERVER['QUERY_STRING'],$queryArray);
                              $queryArray['id_colecciones']=$row['id'];
                              $queryString=http_build_query($queryArray);
                              echo "historias_imagenes_guardar.php?".$queryString;
                              ?>" class="btn btn-lg btn-red">Agregar</a>
                           <br>
                        </div>
                     </div>
                     <div class="work-description">
                        <h2><?php echo $row['descripcion_img']; ?></h2>
                     </div>
                  </div> 
               </div>
               <?php
               } //END WHILE
               ?>
            </div>
         </div>
         <?php
			$totalPaginas = ceil($totalRegistros / $por_Pagina);
		
	if($totalPaginas>1){
		echo "<ul class='carrusel'>";
      parse_str($_SERVER['QUERY_STRING'],$queryArray);
      $queryArray['pagina']=1;
      $queryString=http_build_query($queryArray);
      $ref=$_SERVER['PHP_SELF'];
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
	}
		?>
      </div>
      
   
         <?php
            include("../includes/comentarios_series.php")
         ?>
      
   </section>
   

   
   <section class="call-to-action bg-light">
      <div class="container">
         <div class="row">
            <div class="col-sm-9 col-xs-12">		
               <h2 class="mb-0">Si aún no te has registrado, este es el momento</h2>
            </div>
            <div class="col-sm-3 col-xs-12 cta-button">
               <a href="../registro/" class="btn btn-lg btn-dark">Regístrate</a>
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