<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php
	$SelectImagen_1 = $_GET['colaborador'];

	include("../utils/conexion_tabla.php");

	$query = "SELECT * FROM usuarios_ WHERE autor='$SelectImagen_1'";
	$resultado = $conexion_tabla->query($query);

	if (mysqli_num_rows($resultado) == 1) {
		$row = $resultado->fetch_assoc();


	?>


		<title>Colaborador <?php echo $row['autor']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
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
		include('../components/header.php')
	?>

	<!--- WRAPP --->
	<div class="main-wrapper oh">

		<section class="page-title text-center" style="background-image: url(data:image/jpg;base64,<?php echo base64_encode($row['imagenUser']);  ?>)">
			<div class="container relative clearfix">
				<div class="title-holder">
					<div class="title-text">
						<ol class="breadcrumb">
							<li> <a>Colaborador</a> </li>
						</ol>
					</div>
				</div>
			</div>
		</section>

		<section class="section-wrap">

			<div class="container">
				<div class="row">

					<div class="col-sm-6">
						<p>Colaborador</p>
						<h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0"><?php echo $row['autor']; ?></h2>
						<p>
							<i class="bg-success text-success">&nbsp;Ocupación: &nbsp;</i> <?php echo $row['ocupacion']; ?> <br />
							<i class="bg-success text-success">&nbsp;Residencia: &nbsp;</i> <?php echo $row['residencia']; ?> <br />
							<i class="bg-success text-success">&nbsp;Correo de contacto: &nbsp;</i> <?php echo $row['email']; ?><br />
						</p>
					</div>

					<div class="col-sm-6">
						<div class="work-container">
							<div class="work-img">
								<br /><br />
								<!--- <img width="240" height="120" src='data:image/jpg;base64,<?php //echo base64_encode($row['imagenUser']);  
																								?> ' alt=""> -->
							</div>
						</div>
					</div>

				<?php

			} else {
				echo "<h1> NO SE ENCONTRÓ EL USUARIO </h1>";
			}
				?>

				</div>
			</div>


			<div class="container">
				<br /><br />
				<h2 class="heading relative heading-small bottom-line style-2 left-align mb-0">Series</h2><br /><br />
				<div class="row recent-posts">
					<div id="portfolio-container" class="works-grid small-gutter with-title">

						<?php
						$SelectImagen_1 = $_GET['colaborador'];
						include("../utils/conexion_tabla.php");
						$query = "SELECT * FROM series";
						$resultado = $conexion_tabla->query($query);

						while ($row = $resultado->fetch_assoc()) {
							if ($SelectImagen_1 == $row['autor']) {

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

							} else {
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
							<span> © 2019 Archivo Mixtli | por <a href="https://www.facebook.com/sociedaddeexperimentacion/" target="_blank">Sociedad de experimentación</a> </span>
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