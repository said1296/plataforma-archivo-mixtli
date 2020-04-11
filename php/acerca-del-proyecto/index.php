<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Acerca del proyecto | Preservación Digital Comunitaria</title>
   <?php
      include("../components/head.php");
   ?>
 </head>
  
 <body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">
  <!--
  <div class="loader-mask">
   <div class="loader">
    "Cargando..."
   </div>
	</div>
-->
  
<?php
	include("../components/header.php")
?>
  
  <!--- WRAPP --->
  <div class="main-wrapper oh">
  
   <!--- BANNER SECTION --->
   <section class="page-title style-3 text-center" style="background-image:url(../../themes/img/sections/login.jpg)">
    <div class="container relative clearfix">
	 <div class="title-holder">
	  <div class="title-text">
	   <h1 class="uppercase">Preservación digital comunitaria</h1>
	    <ol class="breadcrumb">
		 <li><a>Proyecto</a></li>
		</ol>
	  </div>
	 </div>
	 <div class="local-scroll hidden-sm hidden-xs">
	  <a href="#descripcion" class="scroll-down"> <i class="fa fa-angle-down"></i></a>
	 </div>
	</div>
   </section>
   <!--- END BANNER SECTION --->
	
   
   <section class="section-wrap" id="descripcion">
	<div class="container">
	 <div class="row">
      
      <div class="col-md-9 col-md-offset-2">
	   <div class="about-description">
	    <h2 class="bottom-line text-center">Descripción del proyecto</h2>
			<p class="text-justify">
				<?php
						include("../zUtils/conexion_tabla.php");
						$query = "SELECT * FROM proyecto WHERE campo='descripcion'";
						$resultado = $conexion_tabla->query($query);
						$row = $resultado->fetch_assoc();
						echo nl2br($row['valor']);	
				?>
      </p>
	   </div>
	   
	   <h2 class="heading relative  bottom-line style-2 left-align mt-50 mb-0">Los objetivos del proyecto son:</h2>

					<!-- Stripped Rows -->
					<div class="table-wrap">
						<table class="table table-striped">
							<tbody>
								<?php 
										$query = "SELECT * FROM proyecto WHERE campo='objetivo' ORDER BY posicion ASC";
										$resultado = $conexion_tabla->query($query);
										while($row = $resultado->fetch_assoc()){
								?>
								<tr>
									<th> <?php echo $row['valor'] ?> </th>	
								</tr> 

						<?php
								} //END WHILE
						?>                     			
							</tbody>
						</table>
					</div>
	   
	   
	  </div>
      
      
	</div>
   </section>
   
<section class="section-wrap" id="comoFunciona">
	<div class="container">
	 <div class="row">
      
      <div class="col-sm-6">
       <h2 class="text-left">Cómo funciona</h2>
       <h5 class="relative  bottom-line style-2 left-align mt-50 mb-0">¿Qué es la preservación digital comunitaria?</h5>
	   <div class="about-description">
	    
	    <div class="progress-bars skills-progress">

			<?php
				$query = "SELECT * FROM proyecto WHERE campo='preservacion' ORDER BY posicion ASC";
				$resultado = $conexion_tabla->query($query);
				$totalRegistros = mysqli_num_rows($resultado);
				$primeraColumna = floor($totalRegistros/2);

				$query = "SELECT * FROM proyecto WHERE campo='preservacion' ORDER BY posicion ASC LIMIT 0, $primeraColumna";
				$resultado = $conexion_tabla->query($query);

				while($row = $resultado->fetch_assoc()){
			?>

			<p class=""><strong><?php echo $row['posicion'] ?>.- </strong><?php echo $row['valor'] ?></p>
				<div class="progress meter">
				<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" class="progress-bar" role="progressbar">
					<span class="sr-only">100% Complete</span>
				</div>
			</div>

			<?php
				} //END WHILE
			?>

						</div>
	   </div>
	  </div>
      
      <div class="col-sm-6">
	   <div class="progress-bars skills-progress">

			<?php
				$query = "SELECT * FROM proyecto WHERE campo='preservacion' ORDER BY posicion ASC LIMIT $primeraColumna, $totalRegistros";
				$resultado = $conexion_tabla->query($query);

				while($row = $resultado->fetch_assoc()){
			?>

			<p class=""><strong><?php echo $row['posicion'] ?>.- </strong><?php echo $row['valor'] ?></p>
				<div class="progress meter">
				<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" class="progress-bar" role="progressbar">
					<span class="sr-only">100% Complete</span>
				</div>
			</div>

			<?php
				} //END WHILE
			?>

							

						</div>
					</div>
      
     </div>
	</div>
   </section>
   
   <section class="section-wrap" id="FAQ">
    <div class="container">			
	 <div class="row">



	  <div class="col-md-9 col-md-offset-2">
	   <h2 class="bottom-line text-center">F.A.Q.</h2>
	   <div class="toggle">
			
		 
			<?php
				$query = "SELECT * FROM proyecto WHERE campo='faq' ORDER BY posicion";
				$resultado = $conexion_tabla->query($query);

				while($row = $resultado->fetch_assoc()){
			?>
				<div class="acc-panel">
					<a href="#"><?php echo $row['valor'] ?></a>
				</div>
				<div class="panel-content">
					<p> <?php echo $row['respuesta'] ?> </p>
				</div>
			<?php
				} //END WHILE
			?>
		
							

	   
	   </div>
      </div>
     
     </div>
    </div>
   </section>
   
   <section class="section-wrap" id="condiciones">
	<div class="container">
	 <div class="row">
      
      <div class="col-md-9 col-md-offset-2">
	   <div class="about-description">
	    <h2 class="bottom-line text-center">Condiciones de uso</h2>
			<p class="text-justify">
				<?php
						$query = "SELECT * FROM proyecto WHERE campo='condiciones'";
						$resultado = $conexion_tabla->query($query);
						$row = $resultado->fetch_assoc();
						echo nl2br($row['valor']);
				?>
			</p>
	   </div>
	  </div>
      
     </div>  
	</div>
   </section>
   
   <section class="section-wrap" id="privacidad">
	<div class="container">
	 <div class="row">
      
      <div class="col-md-9 col-md-offset-2">
	   <div class="about-description">
	    <h2 class="bottom-line text-center">Aviso de privacidad</h2>
		<p class="text-justify">
			<?php
						$query = "SELECT * FROM proyecto WHERE campo='aviso'";
						$resultado = $conexion_tabla->query($query);
						$row = $resultado->fetch_assoc();
						echo nl2br($row['valor']);
				?>
			</p>
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