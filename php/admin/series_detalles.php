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
               $admin=1;
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
  
  <?php
   $id = $_REQUEST['id'];
   $serie = $_REQUEST['serie'];
   $pagina = $_REQUEST['pagina'];

   include("conexion_tabla.php");
   $query = "SELECT * FROM colecciones
         WHERE id = '$id'";
   $resultado = $conexion_tabla->query($query);
   $row = $resultado->fetch_assoc();
		 
	     	
  ?>
  <title>Colección <?php echo $row['coleccion']; ?>  Serie <?php echo $row['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>

  
  <meta property="og:title" content="Colección <?php echo $row['coleccion']; ?> Serie <?php echo $row['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen" />
  <meta property="og:description" content="Descripción de la página" />
  <meta property="og:image" content="http://.jpg" />      
  <meta property="og:url" content="http://" />

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
  
  
   <section class="page-title text-center" style="background-image: url(<?php
      if($row['tipo']=='foto'){
         echo "data:image/jpg;base64,".base64_encode($row['img']);
      }elseif($row['tipo']=='video'){
         $url=$row['link'];
         if(strpos($url,"youtube")){
            parse_str( parse_url( $url, PHP_URL_QUERY ), $url_vars );
            $video_id = $url_vars['v'];
            $url_background = "http://img.youtube.com/vi/".$video_id.'/hqdefault.jpg';
            echo $url_background.")";
         }elseif(strpos($url,"archive")){
            $url=explode("/",$url);
            $url_background="https://archive.org/services/img/".end($url);
            echo $url_background.")";
         }
      }else{
         echo '../../themes/img/sections/colecciones.jpg); background-position: 0 -590px;';
      }
      ?>">
    <div class="container relative clearfix">
	 <div class="title-holder">
	  <div class="title-text">
       <ol class="breadcrumb"><li> <a>Colección</a> </li></ol>
	   <h1 class="uppercase"><?php echo $row['coleccion']; ?></h1>
	  </div>
	 </div>
	</div>
   </section>
   
   
    
   </div>
   
   <section class="section-wrap">
	<div class="container">
	 <div class="row">
     
      <div class="col-sm-6">
        <a href="
        <?php
         if($_GET['consulta']){
            $consulta = $_GET['consulta'];
            if(isset($_GET['pagina_buscar'])){
               echo "series_imagenes.php?serie=".$serie."&pagina=".$pagina."&pagina_buscar=".$_GET['pagina_buscar']."&consulta=".$consulta;
            }else{
               echo "series_buscar.php?pagina=".$pagina."&consulta=".$consulta;
            }
         }else{
            echo "series_imagenes.php?serie=".$serie."&pagina=".$pagina."&pagina_series=".$_GET['pagina_series'];
         }
        ?>
        "><li class="btn btn-sm btn-dark">Regresar</li></a>
       <h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0 mt-30"><?php echo $row['coleccion']; ?></h2>
       <p>
        <?php echo $row['descripcion_serie']; ?> <br /><br />
        
        <i class="bg-success text-success">&nbsp;Autor: &nbsp;</i> 
        <?php echo $row['autor']; ?> <br />
        <i class="bg-success text-success">&nbsp;Grupo: &nbsp;</i> 
        <?php echo $row['grupo']; ?> <br />
        <i class="bg-success text-success">&nbsp;Serie: &nbsp;</i> 
        <?php echo $row['serie']; ?> <br />
        <i class="bg-success text-success">&nbsp;Fecha: &nbsp;</i> 
        <?php echo $row['fecha']; ?> <br />
        <i class="bg-success text-success">&nbsp;Lugar: &nbsp;</i> 
        <?php echo $row['lugar']; ?> <br />
       </p>
      </div>
      
   <?php
      if($row["tipo"]=="foto"){
   ?>
      <div class="col-sm-6">
       <article>
       <div class="entry-img hover-scale">
       <a href="#" class="entry-category-label green">Mixtli</a>
       <a class="lightbox-gallery" title="<?php echo $row['descripcion_img']; ?>" href="data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?>">
        <img src='data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?> '/>
       </a>
       </div>
       </article>
   <?php
      }
      else if($row["tipo"]=="video"){
   ?>
      <div class="col-sm-6">
         <a href="#" class="entry-category-label green">Mixtli</a>
         <iframe class="embed-responsive-item" width=555vw height=350vh src="<?php
            $url=$row['link'];
            $finalUrl = '';
            if(strpos($url, 'facebook.com/') !== false) {
               //it is FB video
               $finalUrl.='https://www.facebook.com/plugins/video.php?href='.rawurlencode($url).'&show_text=1&width=200';
            }else if(strpos($url, 'vimeo.com/') !== false) {
               //it is Vimeo video
               $videoId = explode("vimeo.com/",$url)[1];
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://player.vimeo.com/video/'.$videoId;
            }else if(strpos($url, 'youtube.com/') !== false) {
               //it is Youtube video
               $videoId = explode("v=",$url)[1];
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://www.youtube.com/embed/'.$videoId;
            }else if(strpos($url, 'youtu.be/') !== false){
               //it is Youtube video
               $videoId = explode("youtu.be/",$url)[1];
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://www.youtube.com/embed/'.$videoId;
            }else if(strpos($url, 'archive.org/') !== false){
               //it is Youtube video
               $videoId = end(explode("/",$url));
               if(strpos($videoId, '&') !== false){
                     $videoId = explode("&",$videoId)[0];
               }
               $finalUrl.='https://www.archive.org/embed/'.$videoId;
            }else{
               echo "Video inválido";  
            }
            echo $finalUrl;
         ?>" allowfullscreen></iframe>
   <?php
      }
      else if($row["tipo"]=="audio"){
   ?>
      <div class="col-sm-6">
         <article>
            <div class="entry-img hover-scale">
               <a href="#" class="entry-category-label green">Mixtli</a>
                  <a class="lightbox-gallery" title="<?php echo $row['descripcion_img']; ?>" href="data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?>">
                  <?php
                     if($row['link']){
                        $url=$row['link'];
                        if(strpos($url,"soundcloud.com/")){
                           $url=explode("soundcloud.com", $url)[1];
                           $url_final = "https://w.soundcloud.com/player/?url=https%3A//soundcloud.com".$url."&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true";
                           echo "<iframe class='embed-responsive-item' width=555vw height=350vh src='".$url_final."' allow fullscreen></iframe>";
                        }elseif(strpos($url,"archive.org/")){
                           $url=end(explode("/", $url));
                           $url_final = "https://archive.org/embed/".$url;
                            echo "<div style='top:200px; position:relative;'> <iframe class='embed-responsive-item' width=555vw height=350vh src='".$url_final."' allow fullscreen></iframe> </div>";
                        }
                     }else{
                        echo '<audio controls> <source src="data:audio/mpeg;base64,'.base64_encode($row['img']).'"> </audio>';
                     }
                  ?>
               </a>
            </div>
         </article>
   <?php
      }
   ?>
       
       <span class="bottom-line" style-2></span>
       <?php echo $row['descripcion_img']; ?>
      </div>
      
      
   <div class="container">
      <div class="row">
         <div class="col-sm-6">
         </div>
         <div class="col-sm-6">
            <div class="right">
               <p>&nbsp;
                  <ul class="text-center">
                     <a style="width:180px;" href="series_modificar_imagen.php?<?php
                        parse_str($_SERVER['QUERY_STRING'], $queryArray);
                        $queryArray['ref']=$_SERVER['PHP_SELF'];
                        $queryArray['id']=$row['id'];
                        $queryArray['serie']=$row['serie'];
                        $queryString=http_build_query($queryArray);
                        echo $queryString;
                        ?>" class="btn btn-lg btn-blue">Modificar</a>
                  </ul>
               </p>
            </div>
         </div>
      </div>
   </div>
      
     </div>
	</div>
    
    <div class="container">
     <div class="row">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
       <div class="right">
        <p>&nbsp;
        </p>
       </div>
      </div>
     </div>
    </div>
    
    
    <?php
        include("../includes/comentarios_items.php");
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