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
	include('../zComponents/header.php');
	$titleBig='Historias';
	include('../zComponents/banner.php');
	?>

		<section class="section-wrap">

			<div class="container">
				<div class="row">

					<div class="col-sm-6">
						<div class="about-description">
							<p></p>
						</div>
					</div>

				</div>
			</div>


			<div class="container">
				<h2 class="heading relative heading-small upperacase bottom-line style-2 left-align mb-0"></h2><br /><br />
				<div class="row">
					<div id="portfolio-container" class="works-grid small-gutter with-title">

						<?php
						$SelectGrupo = $_GET['grupo'];
						include("../zUtils/conexion_tabla.php");
						$query = "SELECT * FROM historias ORDER BY fecha desc";
						$resultado = $conexion_tabla->query($query);

						if ($resultado->num_rows > 0) {

							while ($row = $resultado->fetch_assoc()) {
								$ids=[$row['idUsuario'], 0];
								$descripcion=$row['titulo'];
								$ref='historia';
								$tipo='foto';
								include('../zComponents/mediaCard.php');
							} //end while

						} else {
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

	<script type="text/javascript" src="../../themes/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../themes/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../themes/js/plugins.js"></script>
	<script type="text/javascript" src="../../themes/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="../../themes/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="../../themes/js/rev-slider.js"></script>
	<script type="text/javascript" src="../../themes/js/scripts.js"></script>

</body>

</html>