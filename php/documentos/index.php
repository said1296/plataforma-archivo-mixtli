<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Documentos | Preservación Digital Comunitaria</title>
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
	   <h1 class="uppercase">Documentos</h1>
	   <ol class="breadcrumb">
		<li> En este espacio se encuentran documentos relevantes para el conocimiento de la región de Xochimilco.</li>
	   </ol>
	  </div>
	 </div>
	</div>
   </section>
	
      
   <section class="section-wrap">
    <div class="container">
	 
     <!--- FILTER 
     <div class="row"> 
	  <div class="col-md-12">
	   <div class="portfolio-filter">
	    <a href="#" class="filter active" data-filter="*">Todas</a>
		<a href="#" class="filter" data-filter=".user">user</a>
	   </div>
	  </div>
	 </div>
     <!--- FILTER --->

	 <div class="row recent-posts">
      <h2>Textos de La Sociedad de Experimentación</h2>
			<br>
	  <div id="portfolio-container" class="works-grid small-gutter">
      
        <?php
	     
		 include("../zUtils/conexion_tabla.php");
		 //include_once 'fotografias.php';
		 
		 // cantidad de registros por pagina
		 $por_Pagina = 15;
		 $nums=1;
		 
		 if(isset($_GET['pagina'])){
			 $pagina = $_GET['pagina'];
	     }else{
			 $pagina = 1;
			 }
			 
	     //la página inicia en 0 y se multiplica $por_Pagina
		 $empieza = ($pagina - 1) * $por_Pagina;
		 
		 //seleccionar los registros de la tabla gestion_imagen con LIMIT
		 $query = "SELECT * FROM documentos ORDER BY id desc LIMIT $empieza, $por_Pagina ";
		 
		 //$resultado = mysqli_query($conexion_tabla, $query);
		 
		 //$query = "SELECT * FROM gestion_imagen";
		 $resultado = $conexion_tabla->query($query);
		 while($row = $resultado->fetch_assoc()){
			 
	   ?>
      
<a href="<?php echo $row['link']; ?>" target="_blank">
	<div class="col-md-3 col-sm-6 col-xs-12 work-item">
		<div class="work-container">
			<div class="work-img">
				<img src='data:image/jpg;base64,<?php echo base64_encode($row['imgD']);  ?> ' alt="">
				<div class="work-overlay">
				</div>
			</div>
			<div class="work-description">
				<h2><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['documento']; ?></a></h2>
				<span><?php echo $row['ano']; ?></span>
			</div>
		</div> 
	</div>
</a>
       
       <?php
	     if ($nums%4==0){
			 echo '<div class="clearfix"></div>' . '<br>';
			 }
			 $nums++;
			 
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
//		$query = "SELECT * FROM documentos";
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