<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <?php
	    
		$SelectGrupo = $_GET['grupo'];
			 
	   	     	
  ?>
  
  
  <title>Grupo <?php echo $SelectGrupo  ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
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
  
   <section class="page-title style-2 text-center">
    <div class="container relative clearfix">
	 <div class="title-holder">
	  <div class="title-text">
	   <h1 class="uppercase">Historias Anteriores</h1>
	   <ol class="breadcrumb">
		<li> <?php echo $SelectGrupo  ?></li>
	   </ol>
	  </div>
	 </div>
	</div>
   </section>
   
   <section class="section-wrap">
    
    <div class="container">
	 <div class="row">
      
      <div class="col-sm-6">
	   <div class="about-description">
	    <p></p>
	   </div>
	  </div>
      
<!--      <div class="col-sm-6">
	   <div class="nav-search type-2 hidden-sm hidden-xs">
	    <form action="buscar.php?grupo=<?php echo $SelectGrupo; ?>" method="post">
		 <input type="search" class="form-control" name="consulta" placeholder="Buscar">
		 <button type="submit" class="search-button">
		  <i class="icon icon_search"></i>
		 </button>
		</form>
	   </div>
		</div>
-->
      
     </div>
	</div>
    
	
    <div class="container">
	 <br /><br />
     <h2 class="heading relative heading-small upperacase bottom-line style-2 left-align mb-0">Historias</h2><br /><br /> 
	 <div class="row">
	  <div id="portfolio-container" class="works-grid small-gutter with-title">
      
        <?php
	     $SelectGrupo = $_GET['grupo'];
		 include("../zUtils/conexion_tabla.php");
		 $query = "SELECT * FROM historias";
		 $resultado = $conexion_tabla->query($query);
		 
		 if($resultado->num_rows > 0){
		   
		   while($row = $resultado->fetch_assoc()){
		   
		    if(1==1){
		 
			$id_historias = $row['id'];
			$query2 = "SELECT * FROM historias_imgs WHERE id_historias='$id_historias'";
			$resultado2 = $conexion_tabla->query($query2);
			$row2 = $resultado2->fetch_assoc();

			$id_colecciones = $row2['id_colecciones'];
			
			$query2 = "SELECT * FROM items WHERE id='$id_colecciones'";
			$resultado2 = $conexion_tabla->query($query2);
			$row2 = $resultado2->fetch_assoc();

			
	   ?>
	   
      

	  <div class="col-md-3 col-sm-6 col-xs-12 work-item">
		<div class="work-container">
		 <div class="work-img">
		  <img src='data:image/jpg;base64,<?php echo base64_encode($row2['img']);  ?> ' alt="">
		  <div class="work-overlay">
		    <a href="ver_historia.php?id=<?php echo $row['id'] ?>" class="btn btn-lg btn-red">Ver</a>
		  </div>
		 </div>
         <div class="work-description">
			 <h2><a href="serie.php?serie=<?php echo $row['serie']; ?>"><?php echo $row['titulo']; ?></a></h2>
			 <h2><a href="serie.php?serie=<?php echo $row['serie']; ?>">Por: <?php echo $row['autor']; ?></a></h2>
		 </div>
		</div> 
	   </div>
       
       <?php
	          
			  } else{
			    echo "No se encuentran registros";
			   }
			   
		   } //end while
		 
		}else{
			 echo "No hay historias en la base";
			}
		
						
       ?>
       
      </div>
     </div>
     
     <div class="row">
      <div>
       <br /><br /><br />
       <?php
		// seleccionar todo
//		$query = "SELECT * FROM gestion_imagen";
//		$resultado = $conexion_tabla->query($query);
		//$resultado = mysqli_query($conexion_tabla, $query);
					
		//contar el total de registros
//		$totalRegistros = mysqli_num_rows($resultado);
					
		//usando ciel para dividir el total de resgitros
//		$totalPaginas = ceil($totalRegistros / $por_Pagina);
					
		// link a la primera página
//		echo "<ul>";
//		echo "<li class='btn btn-md btn-light'><a href='index.php?pagina=1'>".'Primera '."</a></li>";
					
//		for($i=1; $i<=$totalPaginas; $i++){
//			echo "<li class='btn btn-md btn-light'><a href='index.php?pagina=".$i."'>".$i."</a></li>";
//			}
		// link a la ultima página
//		echo "<li class='btn btn-md btn-light'><a  href='index.php?pagina=$totalPaginas'>".'Última '."</a></li>";
//		echo "</ul>";
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