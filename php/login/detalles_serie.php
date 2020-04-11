<?php
  session_start();
  
  include("conexion_usuario.php");
  
  if(isset($_SESSION['u_usuario'])){
	  $proceso = $conexionUsuario->query(" SELECT * FROM usuarios_ WHERE usuario='$usuario' AND contrasena='$contrasena'");
	
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
  
  <?php
	    $id = $_REQUEST['id'];
		
		 include("../zUtils/conexion_tabla.php");
 		 $query = "SELECT * FROM items
					WHERE id = '$id' ";
		 
	     $resultado = $conexion_tabla->query($query);
		 $row = $resultado->fetch_assoc();
		 
	     	
  ?>
  <title>Colección <?php echo $row['coleccion']; ?>  Serie <?php echo $row['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>

  
  <meta property="og:title" content="Colección <?php echo $row['coleccion']; ?> Serie <?php echo $row['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen" />
  <meta property="og:description" content="Descripción de la página" />
  <meta property="og:image" content="http://.jpg" />      
  <meta property="og:url" content="http://" />
  
   <?php
      include("../components/head.php");
   ?>
 </head>
  
 <body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">
  
  <div class="loader-mask">
   <div class="loader">
    "Cargando..."
   </div>
  </div>
  
   <?php
		include('../components/header.php')
	?>
  
  <!--- WRAPP --->
  <div class="main-wrapper oh">
  
  
  <?php
   if($row['tipo']=='foto'){
      echo '<section class="page-title text-center" style="background-image: url(data:image/jpg;base64,'.base64_encode($row['img']).')">';
   }elseif($row['tipo']=="video"){
      $url=$row['link'];
      if(strpos($url,"youtube")){
         parse_str( parse_url( $url, PHP_URL_QUERY ), $url_vars );
         $video_id = $url_vars['v'];
         $url_background = "http://img.youtube.com/vi/".$video_id.'/hqdefault.jpg';
         echo '<section class="page-title text-center" style="background-image: url('.$url_background.')">';
      }elseif(strpos($url,"archive")){
         $url=explode("/",$url);
         $url_background="https://archive.org/services/img/".end($url);
         echo '<section class="page-title text-center" style="background-image: url('.$url_background.')">';
      }
   }else{
      $url_background = "../../themes/img/misc/audio_icon.jpg";
      echo '<section class="page-title text-center" style="background-image: url('.$url_background.')">';
   }
  ?>
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
     
      <div class="col-sm-6" style="font-size:16px;">
       <h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0"><?php echo $row['coleccion']; ?></h2>
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
         <?php
            $lugares=$row['lugar'];
            $lugares = explode(",",$lugares);
            foreach($lugares as $lugar){
               echo $lugar." / ";
            }
         ?>
         <i id="añadir-lugares" style="color:#3c763d; font-size:22px; cursor:pointer; position:relative; top:4px;" class="icon_plus_alt"></i>
         <div class="mt-10 ocultar añadir" id="añadir-lugares-div">
            <form action="detalles_añadir.php" method="get">
               <?php
                  parse_str($_SERVER['QUERY_STRING'],$queryArray);
                  foreach($queryArray as $key=>$value){
                     echo "<input type='hidden' name='$key' value='$value'>";
                  }
               ?>
               <input type="hidden" name="ref" value="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input type="hidden" name="tipo" value="lugares">
               <input type="text" REQUIRED data-role="tagsinput" id="lugares" name="lugares" placeholder="Separados por comas..." value=""/>
               <button type="submit" class="btn btn-success" style="background:none;border:none;"><i style="color:#3c763d; font-size:30px; cursor:pointer; position:relative;" class="icon_check_alt"></i></button>
               <button type="button" id="cancelar-lugares" class="btn btn-danger" style="background:none;border:none;"><i style="color:#ef5659; font-size:30px; cursor:pointer; position:relative;left:-20px;" class="icon_close_alt"></i></button>
            </form>
         </div>
         <br>
         <i class="bg-success text-success">&nbsp;Personajes: &nbsp;</i>
         <?php
            $personajes=$row['personajes'];
            $personajes = explode(",",$personajes);
            foreach($personajes as $personaje){
               echo $personaje." / ";
            }
         ?>
         <i id="añadir-personajes" style="color:#3c763d; font-size:22px; cursor:pointer; position:relative; top:4px;" class="icon_plus_alt"></i>
         <div class="mt-10 ocultar añadir" id="añadir-personajes-div">
            <form action="detalles_añadir.php" method="get">
               <?php
                  parse_str($_SERVER['QUERY_STRING'],$queryArray);
                  foreach($queryArray as $key=>$value){
                     echo "<input type='hidden' name='$key' value='$value'>";
                  }
               ?>
               <input type="hidden" name="ref" value="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input type="hidden" name="tipo" value="personajes">
               <input type="text" REQUIRED data-role="tagsinput" id="personajes" name="personajes" placeholder="Separados por comas..." value=""/>
               <button type="submit" class="btn btn-success" style="background:none;border:none;"><i style="color:#3c763d; font-size:30px; cursor:pointer; position:relative;" class="icon_check_alt"></i></button>
               <button type="button" id="cancelar-personajes" class="btn btn-danger" style="background:none;border:none;"><i style="color:#ef5659; font-size:30px; cursor:pointer; position:relative;left:-20px;" class="icon_close_alt"></i></button>
            </form>
         </div>
         <br>
         <i class="bg-success text-success">&nbsp;Descriptores: &nbsp;</i>
         <?php
            $descriptores=$row['descriptores'];
            $descriptores = explode(",",$descriptores);
            foreach($descriptores as $descriptor){
               echo "<span class='tag label label-info' style='display:inline-block;margin-right:2px;margin-top:10px;'>".$descriptor."</span>";
            }
         ?>
         <i id="añadir-descriptores" style="color:#3c763d; font-size:22px; cursor:pointer; position:relative; top:6px;" class="icon_plus_alt"></i> <br />
         <div class="mt-10 ocultar añadir" id="añadir-descriptores-div">
            <form action="detalles_añadir.php" method="get">
               <?php
                  parse_str($_SERVER['QUERY_STRING'],$queryArray);
                  foreach($queryArray as $key=>$value){
                     echo "<input type='hidden' name='$key' value='$value'>";
                  }
               ?>
               <input type="hidden" name="ref" value="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input type="hidden" name="tipo" value="descriptores">
               <input type="text" REQUIRED data-role="tagsinput" class="descriptores" id="descriptores" name="descriptores" placeholder="Separados por comas..." value=""/>
               <button type="submit" class="btn btn-success" style="background:none;border:none;"><i style="color:#3c763d; font-size:30px; cursor:pointer; position:relative;" class="icon_check_alt"></i></button>
               <button type="button" id="cancelar-descriptores" class="btn btn-danger" style="background:none;border:none;"><i style="color:#ef5659; font-size:30px; cursor:pointer; position:relative;left:-20px;" class="icon_close_alt"></i></button>
            </form>
         </div>
      </div>
      
<?php
   if($row["tipo"]=="foto"){
?>
      <div class="col-sm-6 mt-20">
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
                  <iframe class="embed-responsive-item" width=555vw height=350vh src="<?php
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
                     echo "https://w.soundcloud.com/player/?url=https%3A//soundcloud.com".$url."&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"
                  ?>" allowfullscreen></iframe>
               </a>
            </div>
         </article>
<?php
   }
?>
       
      <span class="bottom-line" style-2></span>
      <?php
         echo $row['descripcion_img']."<br>";
         $query="SELECT * FROM descripciones WHERE ColeccionesID='$id'";
         $resultado_descripciones=$conexion_tabla->query($query);
         while($row_descripciones=$resultado_descripciones->fetch_assoc()){
            echo $row_descripciones['Descripcion']."<br>";
         }
      ?>
         <div id="div-añadir-descripcion" class="mt-30">
            <form method='get' action="detalles_añadir.php" id='añadir-descripcion' class="mt-10" style="padding-bottom:0px;margin-bottom:0px;">
               <?php
                  parse_str($_SERVER['QUERY_STRING'],$queryArray);
                  foreach($queryArray as $key=>$value){
                     echo "<input type='hidden' name='$key' value='$value'>";
                  }
               ?>
               <input type="hidden" name="ref" value="<?php echo $_SERVER['PHP_SELF'] ?>">
               <input type="hidden" name="tipo" value="descripcion">
               <div id="campos-añadir">Añadir</button>
                  <textarea name="descripcion" placeholder="Añada una descripcion..." id="añadir-descripcion-textarea" form='añadir-descripcion' style="resize:none;height:80px;"></textarea>
               </div>
               <button type="submit" class="btn btn-success" style="background:green;border:none;width:100%;height:25px;position:relative;top:-26px;border-radius:0 0 20px 20px;text-transform: none; font-family: 'Raleway', sans-serif;font-size:12px;line-height:10px;">Añadir</button>
            </form>
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
        <ul class="text-center">
        <?php
         if($row['tipo']=='foto'){
            echo '<a href="../colecciones/viewimg.php?id='.$row['id'].'"><li class="btn btn-sm btn-light">Descargar</li></a>
            <a href="ver_serie.php?serie='.$_GET['serie'].'"><li class="btn btn-sm btn-dark">Regresar</li></a>';
         }elseif($row['tipo']=="video"){
            echo '<a target="_blank" href="'.$row['link'].'"><li class="btn btn-sm btn-light">Link original</li></a>
            <a href="ver_serie.php?serie='.$_GET['serie'].'"><li class="btn btn-sm btn-dark">Regresar</li></a>'; 
         }elseif($row['tipo']=='audio'){
            if(empty($row['img'])){
               echo '<a target="_blank" href="'.$row['link'].'"><li class="btn btn-sm btn-light">Link original</li></a>
               <a href="serie.php?serie='.$_GET['serie'].'"><li class="btn btn-sm btn-dark">Regresar</li></a>'; 
            }else{
               echo '<a href="serie.php?serie='.$_GET['serie'].'"><li class="btn btn-sm btn-dark">Regresar</li></a>';
            }
         }
         ?>
        </ul>
        </p>
       </div>
      </div>
     </div>
    </div>
    

   <?php
      include("../components/comentarios_items.php")
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