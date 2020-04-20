<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Colecciones | Preservación Digital Comunitaria</title>
	
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
  
   <section class="page-title style-2 text-center">
    <div class="container relative clearfix">
	 <div class="title-holder">
	  <div class="title-text">
	   <h1 class="uppercase">Colecciones</h1>
	   <ol class="breadcrumb">
		<li> Colecciones que preservan nuestra imagen.</li>
	   </ol>
	  </div>
	 </div>
	</div>
   </section>
	
   
   <section class="section-wrap" id="colections">
	<div class="container">
	 <div class="row">
      
      <div class="col-sm-6">
	   <div class="about-description">
	    <p>Puedes descargar las imágenes que escojas así como realizar tus propias curadurías (selección de imágenes) para contar una historia y que otros usuarios y colaboradores de la página conozcan tu perspectiva.</p>
	   </div>
	  </div>
      
      <div class="col-sm-6">
	   <div class="about-description">
	    <p>Puedes hacer tu propio álbum partir de fotografías ubicadas en diferentes grupos.</p>
	   </div>
	  </div>
      
     </div>
	</div>
   
    <div class="container-fluid nopadding">
	 <br />
     <div class="row">
	  <div id="portfolio-container" class="works-grid small-gutter  masonry grid-4-col">
      
        <?php
	     
		 include("../utils/conexion_tabla.php");
		
		 $por_Pagina = 15;
		 $nums=1;
		 
		 if(isset($_GET['pagina'])){
			 $pagina = $_GET['pagina'];
	     }else{
			 $pagina = 1;
			 }
			 
	     $empieza = ($pagina - 1) * $por_Pagina;
		 
		 $query = "SELECT * FROM usuarios_ ORDER BY id desc LIMIT $empieza, $por_Pagina";
		 
		 $resultado = $conexion_tabla->query($query);
		 while($row = $resultado->fetch_assoc()){
			 
	   ?>
      

	   <div class="work-item mansory-item">
		<div class="work-container">
		 <div class="work-img">
		  <img src='data:image/jpg;base64,<?php echo base64_encode($row['img1']);  ?> ' alt="">
		  <div class="work-overlay">
		   
		    <a href="coleccion.php?coleccion=<?php echo $row['coleccion']; ?>" class="btn btn-lg btn-red">Explorar</a>
			
		  
		  </div>
		 
         <div class="work-description">
		   <h2><a href="coleccion.php?coleccion=<?php echo $row['coleccion']; ?>"><?php echo $row['coleccion']; ?></a></h2>
		   <span><?php echo $row['autor']; ?></span>
		 </div>
		 
		</div>
	   </div>
	  </div>
	   
       
       <?php
	     if ($nums%4==0){
			 echo '<div class="clearfix"></div>' . '<br>';
			 }
			 $nums++;
			 
		//end WHILE
		echo "\n\n"; 
		 }
						
       ?>
       
      </div>
     </div>
     
     <div class="row">
      <div>
       <br /><br /><br />
       <?php
		$query = "SELECT * FROM usuarios_";
		$resultado = $conexion_tabla->query($query);
	
		$totalRegistros = mysqli_num_rows($resultado);
					
		$totalPaginas = ceil($totalRegistros / $por_Pagina);
					
		echo "<ul class='text-center'>";
		echo "<a href='index.php?pagina=1'><li class='btn btn-md btn-light'>".'Primera '."</li></a>";
					
		for($i=1; $i<=$totalPaginas; $i++){
			echo "<a href='index.php?pagina=".$i."'><li class='btn btn-md btn-light'>".$i."</li></a>";
			}
	
		echo "<a  href='index.php?pagina=$totalPaginas'><li class='btn btn-md btn-light'>".'Última '."</li></a>";
		echo "</ul>";
	   ?>
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