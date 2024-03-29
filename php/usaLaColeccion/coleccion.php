<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
  <?php
	    $SelectImagen_1 = $_GET['coleccion'];
			 
	     include("../utils/conexion_tabla.php");
			 
	     $query = "SELECT * FROM usuarios_";
	     $resultado = $conexion_tabla->query($query);
		 
		while($row = $resultado->fetch_assoc()){
			
			 
		if($SelectImagen_1 == $row['coleccion']){
			
	     	
  ?>
  <title>Colección <?php echo $row['coleccion']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>

  
  <meta property="og:title" content="Colección <?php echo $row['coleccion']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen" />
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
  
  
   <section class="page-title text-center" style="background-image: url(data:image/jpg;base64,<?php echo base64_encode($row['img1']);  ?>)">
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
       <h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0"><?php echo $row['coleccion']; ?> </h2>
       <p>
        <i class="bg-success text-success">&nbsp;Autor: &nbsp;</i> 
        <?php echo $row['autor']; ?> 
       </p>
       
       <?php
		
		}else{
			 
	     }
			 
	   }
	   ?>
	  </div>
      
      
      
     </div>
	</div>
    
   <div class="container">
    <div class="row">
     <br /><br />
	 <div id="portfolio-container" class="works-grid small-gutter with-title">
        
        <?php
	     $SelectImagen_1 = $_GET['coleccion'];
		 include("../utils/conexion_tabla.php");
		 
		 $query = "SELECT * FROM series WHERE coleccion='$SelectImagen_1'";
		 
		 $resultado = $conexion_tabla->query($query);
		 while($row = $resultado->fetch_assoc()){
			 
			 if ($SelectImagen_1 == $row['coleccion']){
			 
	   ?>
      

	   <div class="col-md-3 col-sm-6 col-xs-12 work-item">
		<div class="work-container">
		 <div class="work-img">
		  <img src='data:image/jpg;base64,<?php echo base64_encode($row['imgSerie']);  ?> ' alt="">
		  <div class="work-overlay">
           <a href="serie.php?serie=<?php echo $row['serie']; ?>" class="btn btn-lg btn-red">Explorar</a>
          </div>
		 </div>
         <div class="work-description">
		   <h2><?php echo $row['serie']; ?></h2>
		 </div>
		</div> 
	   </div>
       
       <?php
	   }
	    else{
		}
	     
		 }
						
       ?>
       
      </div>
     </div>
    </div> 
    
    <div class="container">
    
     <div class="row"> 
	  <div class="col-md-12">
	   <div class="">
	    <div class="cta-button mt-30">
        <?php
	     $SelectImagen_1 = $_GET['coleccion'];
		 
       include("../utils/conexion_tabla.php");
       
		 $query = "SELECT * FROM items WHERE coleccion='$SelectImagen_1' ";
		 $resultado = $conexion_tabla->query($query);
		 
		 $filtrofiesta= 'Las fiestas del pueblo';
		 $filtrovida= 'Vida cotidiana';
		 $filtroArquitectura= 'Arquitectura y paisaje';
			 
	   ?>
        
        
        
         <a href="grupo.php?coleccion=<?php echo $SelectImagen_1 ; ?>& grupo=<?php echo $filtrofiesta ; ?>" class="btn btn-lg btn-blue">Las fiestas del pueblo</a>
         <a href="grupo.php?coleccion=<?php echo $SelectImagen_1 ; ?>& grupo=<?php echo $filtrovida ; ?>" class="btn btn-lg btn-red">Vida cotidiana</a>
         <a href="grupo.php?coleccion=<?php echo $SelectImagen_1 ; ?>& grupo=<?php echo $filtroArquitectura ; ?>" class="filter btn btn-lg btn-yellow" data-filter=".Arquitectura">Arquitectura y paisaje</a>
       
       <?php
	    
						
       ?>  
         
        </div>
       </div>
	  </div>
	 </div>
     
	
    
    
    
    </div>
    
    
    
    
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