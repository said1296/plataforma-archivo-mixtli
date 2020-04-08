<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  

  <?php
	include("../includes/conexion_tabla.php");
    $id_historias = $_GET['id'];
    $query_historia = "SELECT * FROM historias where id='$id_historias'";
    $resultado_historia = $conexion_tabla->query($query_historia);
    $row_historia = $resultado_historia->fetch_assoc();
  ?>

  
  <title> <?php echo $row_historia['titulo']  ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
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
       <span class="uppercase historia_titulo"><?php echo $row_historia['titulo']  ?></span>
       <br>
       <span class="uppercase historia_autor"><?php echo $row_historia['autor']  ?></span>
       <br>
       <span class="uppercase historia_fecha"><?php echo $row_historia['fecha']  ?></span>
	  </div>
	 </div>
	</div>
   </section>
   
   <section class="section-wrap">
      <div class="container">
         <div class="row">
            <div style="display:flex; flex-wrap: wrap; justify-content:center;" class="works-grid small-gutter with-title">
         
               <?php
               $id_historias = $row_historia['id'];
               $query = "SELECT * FROM historias_imgs WHERE id_historias='$id_historias' ORDER BY posicion ASC";
               $resultado = $conexion_tabla->query($query);

               if($resultado->num_rows > 0){
                  while($row = $resultado->fetch_assoc()){
                     $id_colecciones = $row['id_colecciones'];
                     $query2 = "SELECT * FROM colecciones WHERE id='$id_colecciones'";
                     $resultado2 = $conexion_tabla->query($query2);
                     $row2 = $resultado2->fetch_assoc();
               
               ?>
         
               <div class="col-md-4 col-sm-6 col-xs-12 work-item">
                  <div class="work-container">
                     <div class="work-img">
                        <?php
                        if($row2['tipo']=="foto"){
                           echo '<img src="data:image/jpg;base64,'.base64_encode($row2['img']).'" alt="">';
                        }elseif($row2['tipo']=="video"){
                           $url=$row2['link'];
                           if(strpos($url,"youtube")){
                              parse_str( parse_url( $url, PHP_URL_QUERY ), $url_vars );
                              $video_id = $url_vars['v'];
                              echo '<img src="http://img.youtube.com/vi/'.$video_id.'/hqdefault.jpg" alt="">';
                           }elseif(strpos($url,"archive")){
                              $url=explode("/",$url);
                              echo '<img src="https://archive.org/services/img/'.end($url).'" alt="">';
                           }
                        }else{
                           if($row2['link']){
                              $url=$row2['link'];
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
                           <a href="detalles.php?id=<?php echo $row2['id']; ?>&id_historia=<?php echo $id_historias ?>" class="btn btn-lg btn-red">Detalles</a>
                           <br>
                        </div>
                     </div>
                     <div class="work-description">
                        <h2><?php echo $row2['descripcion_img']; ?></h2>
                     </div>
                  </div> 
               </div>

               <?php
                     
                     
                  } //end while
               }else{
                  echo "Historia no definida en la base";
                     }
                     
               ?>      
         
               <div class="historia_texto col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
                        <?php 
                           echo nl2br($row_historia['texto']);			
                        ?>
               </div>
               
         
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