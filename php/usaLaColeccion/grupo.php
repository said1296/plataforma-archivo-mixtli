<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  
  <?php
	    $SelectImagen_1 = $_GET['coleccion'];
		$SelectGrupo = $_GET['grupo'];
		
		 include("../zUtils/conexion_tabla.php");
			 
	     $query = "SELECT * FROM coleccion_master";
	     $resultado = $conexion_tabla->query($query);
		 
		 while($row = $resultado->fetch_assoc()){
			
			 
	       if($SelectImagen_1 == $row['coleccion'] ){
			
	     	
  ?>
  <title>Colección <?php echo $row['coleccion']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>

  
  <meta property="og:title" content="Colección <?php echo $row['coleccion']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen" />
  <meta property="og:description" content="Descripción de la página" />
  <meta property="og:image" content="http://.jpg" />      
  <meta property="og:url" content="http://" />

   <?php
      include("../zComponents/head.php");
	 ?>
	 
 </head>
  
 <body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">
  
  <div class="loader-mask">
   <div class="loader">
    "Cargando..."
   </div>
  </div>
  
  	<?php
		include('../zComponents/header.php')
	?>
  
  <!--- WRAPP --->
  <div class="main-wrapper oh">
  
  
   <section class="page-title text-center" style="background-image: url(data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?>)">
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
       <h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0"><?php echo $row['coleccion']; ?></h2>
       <p>
        <i class="bg-success text-success">&nbsp;Autor: &nbsp;</i> 
        <?php echo $row['autor']; ?> <br />
        <i class="bg-success text-success">&nbsp;Grupo: &nbsp;</i> 
        <?php echo $SelectGrupo; ?>
       </p>
       
       <?php
		
		}else{
			}
		//end WHILE
			 
	   }
	   ?>
	  </div>
      
      <div class="col-sm-6">
       <div class=" right nav-search type-2 hidden-sm hidden-xs">
       <?php
	     $SelectImagen_1 = $_GET['coleccion'];
		 $SelectGrupo = $_GET['grupo'];
		 
		 include("../zUtils/conexion_tabla.php");
		 
		 $por_Pagina = 12;
		 $nums=1;
		 
		 if(isset($_GET['pagina'])){
			 $pagina = $_GET['pagina'];
	     }else{
			 $pagina = 1;
			 }
			 
	     $empieza = ($pagina - 1) * $por_Pagina;
		 
		?>
       
       
	    <form action="grupo.php?coleccion=<? echo $SelectImagen_1 ; ?>& grupo=<? echo $SelectGrupo ; ?>" method="get">
		 <input type="search" class="form-control" name="busquedaGrupo" id="busquedaGrupo" placeholder="Buscar">
         <button type="submit" class="search-button">
		  <i class="icon icon_search"></i>
		 </button>
		</form>
	   </div>
      </div>
      
      
     </div>
	</div>
    
    <div class="container">
     <div class="row recent-posts">
	     
	  <h2 class="heading relative heading-small bottom-line style-2 left-align mb-0"></h2><br /><br />
      <div id="portfolio-container" class="works-grid small-gutter with-title">
       
        <?php
		 
		 $query = "SELECT * FROM items
		 			where coleccion='$SelectImagen_1' and grupo='$SelectGrupo' LIMIT $empieza, $por_Pagina ";
//		 WHERE coleccion=$SelectImagen_1 AND grupo=$SelectGrupo ";
		 
	     $resultado = $conexion_tabla->query($query);
		 while($row = $resultado->fetch_assoc()){
//           if(isset($_GET['coleccion'] ) && isset($_GET['grupo'])){
		   if($SelectImagen_1 == $row['coleccion'] && $SelectGrupo == $row['grupo']){
//		   if($SelectGrupo == $row['grupo']){
			   
			 
	    ?>
	    
	    <div class="col-md-3 col-sm-6 col-xs-12 work-item mansory-item <?php echo $row['grupo']; ?>">
		 <div class="work-container">
		  <div class="work-img">
		   <img src='data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?> ' alt="">
		   <div class="work-overlay">
		    <a href="detalles.php?coleccion=<? echo $SelectImagen_1 ; ?>& grupo=<? echo $SelectGrupo ; ?>& id_origen=<? echo $row['id_origen'] ; ?>" class="btn btn-lg btn-red">Detalles</a>
		   </div>
		   <div class="work-description">
		    <h2><a href="detalles.php?coleccion=<? echo $SelectImagen_1 ; ?>& grupo=<? echo $SelectGrupo ; ?>& id_origen=<? echo $row['id_origen'] ; ?>"><?php echo $row['descripcion_img']; ?></a></h2>
		    <span><?php echo $row['autor']; ?></span>
		   </div>
		  </div>
	     </div>
	    </div>
       
       <?php
	      
		}elseif(is_null($SelectGrupo !== $row['grupo']) ){
			
			echo "Lo sentimos está colección aún no cuenta con el apartado de $SelectGrupo";
		
			}
		//end WHILE
		 }
						
       ?>
       
      </div>
     </div>
	
    
    <div class="row">
      <div>
       <br /><br /><br />
       <?php
		// seleccionar todo
		$SelectImagen_1 = $_GET['coleccion'];
		$SelectGrupo = $_GET['grupo'];
		
		
		$query = "SELECT * FROM items 
				  where coleccion='$SelectImagen_1' and grupo='$SelectGrupo'";
		$resultado = $conexion_tabla->query($query);
		$totalRegistros = mysqli_num_rows($resultado);
		$totalPaginas = ceil($totalRegistros / $por_Pagina);
					
		echo "<ul class='text-center'>";
//		echo "<a href='pagina=1'><li class='btn btn-md btn-light'>".'Primera '."</li></a>";
	    echo "<a href='grupo.php?coleccion=$SelectImagen_1&grupo=$SelectGrupo&pagina=1'><li class='btn btn-md btn-light'>".'Primera '."</li></a>";
					
		for($i=1; $i<=$totalPaginas; $i++){
//			echo "<a href='pagina=".$i."'><li class='btn btn-md btn-light'>".$i."</li></a>";
		    echo "<a href='grupo.php?coleccion=$SelectImagen_1&grupo=$SelectGrupo&pagina=".$i."'><li class='btn btn-md btn-light'>".$i."</li></a>";
			
			}
		
//		echo "<a  href='coleccion.php?pagina=$totalPaginas'><li class='btn btn-md btn-light'>".'Última '."</li></a>";
		echo "<a  href='grupo.php?coleccion=$SelectImagen_1& grupo=$SelectGrupo&pagina=$totalPaginas'><li class='btn btn-md btn-light'>".'Última '."</li></a>";
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