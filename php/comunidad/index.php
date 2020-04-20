<?php
session_start();
include("../utils/conexion_tabla.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Comunidad del archivo | Preservación Digital Comunitaria</title>
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
    include('../components/header.php');
    $titleBig = "Colaboradores";
    include('../components/banner.php');
    ?>

	<div class="container">
		<h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0 mt-30"><?php echo $row_serie['coleccion']; ?></h2>
		<div class="row recent-posts">
			<br><br>
			<div id="portfolio-container" class="works-grid small-gutter with-title">

				<?php
				$query = "SELECT * FROM usuarios_";

				$resultado = $conexion_tabla->query($query);
				while ($row = $resultado->fetch_assoc()) {
					$tipo='foto';
					$ids=[$row['id'], 0];
					$descripcion=$row['autor'];
					$ref='usuario';
					include('../components/mediaCard.php');	
				}
				?>
			</div>
		</div>
	</div>



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