<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <?php
	    
		$SelectGrupo = $_GET['grupo'];
			 
	   	     	
  ?>
  
  
  <title>Grupo <?php  echo $SelectGrupo  ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
	<?php
		include("../includes/head.php");
	?>
 </head>
  
<?php
	include("../includes/header.php");
?>

 <body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">
  
  <div class="loader-mask">
   <div class="loader">
    "Cargando..."
   </div>
  </div>

  
  <!--- WRAPP --->
  <div class="main-wrapper oh">
  
   <section class="page-title style-2 text-center">
    <div class="container relative clearfix">
	 <div class="title-holder">
	  <div class="title-text">
	   <h1 class="uppercase">Grupo</h1>
	   <ol class="breadcrumb">
		<li> <?php echo $SelectGrupo  ?></li>
	   </ol>
	  </div>
	 </div>
	</div>
	</section>
   
   <section class="section-wrap">
    
    <div class="container">

			<div class="col-sm-2">
				<div class="nav-search type-2">
					<form action="buscar.php?grupo=<?php echo $SelectGrupo; ?>" method="post">
							<input type="search" id="search-bar" name="consulta" placeholder="Buscar serie">
							<button type="submit" class="search-button">
							<i class="icon icon_search"></i>
					</button>
					</form>
				</div>
			</div>
	<div class="col-sm-12 mt-20">
		<h2 class="heading relative heading-small upperacase bottom-line style-2 left-align mb-0">Series</h2><br /><br /> 
	</div>
	 <div class="row">
	  <div id="portfolio-container" class="works-grid small-gutter with-title">
      
        <?php
	  		$SelectGrupo = $_GET['grupo'];
		 		$consulta = $_REQUEST['consulta'];
		 
		 
		 include("conexion_tabla.php");
		 $query = "SELECT * FROM series WHERE serie LIKE '%$consulta%' AND grupo = '$SelectGrupo' ";
		 $resultado = $conexion_tabla->query($query);
		 
		 
		 if($resultado->num_rows > 0 ){
			  
			while($row = $resultado->fetch_assoc()){ 
		 
	   ?>
	   
      

	   <div class="col-md-3 col-sm-6 col-xs-12 work-item">
		<div class="work-container">
		 <div class="work-img">
		  <img src='data:image/jpg;base64,<?php echo base64_encode($row['imgSerie']);  ?> ' alt="">
		  <div class="work-overlay">
		    <a href="../colecciones/serie.php?serie=<?php echo $row['serie']; ?>" class="btn btn-lg btn-red">Explorar</a>
		  </div>
		 </div>
         <div class="work-description">
		   <h2><a href="../colecciones/serie.php?serie=<?php echo $row['serie']; ?>"><?php echo $row['serie']; ?></a></h2>
		 </div>
		</div> 
	   </div>
       
       <?php
	        //end WHILE
		    }
	   
	   
	      }else{
			 echo "La palabra " .$consulta. " no se encuentra dentro de la base <br>";
			 
			}
		
		
						
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