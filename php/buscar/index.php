<?php
session_start();
include('../includes/conexion_tabla');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<?php

	$consulta = $_GET['consulta'];

	?>


	<title>Búsqueda | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
	<?php
	include("../zComponents/head.php");
	?>
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">

	<?php
	include('../zComponents/header.php');
	$titleSmall = 'Búsqueda';
	$titleBig = $consulta;
	include('../zComponents/banner.php');
	?>

	<section class="section-wrap" style='padding-top:70px;'>

		<div class="container">


			<?php
			$consulta = $_REQUEST['consulta'];
			if (isset($_GET['avanzada_tipo'])) {
				$tipo = $_REQUEST['avanzada_tipo'];
			} else {
				$tipo = "todos";
			}

			if ($tipo == "todos") {
			?>
				<h2 class="heading relative heading-small upperacase bottom-line style-2 left-align mb-0">Series</h2>
				<div class="row recent-posts mb-20">
					<div id="portfolio-container" class="works-grid small-gutter with-title">

						<?php
						include("../zUtils/conexion_tabla.php");
						if ($_GET["avanzada_serie"]) {
							$columns[] = 'serie';
							$weights[] = '3';
						}
						if ($_GET["avanzada_seriedescripcion"]) {
							$columns[] = 'descripcion_serie';
							$weights[] = '2';
							if ($match_query != '') {
								$match_query = $match_query . ' OR ';
							}
						}
						if ($_GET["avanzada_autor"]) {
							$columns[] = 'usuarios_.autor';
							$weights[] = '1';
							if ($match_query != '') {
								$match_query = $match_query . ' OR ';
							}
						}
						if ($match_query == '') {
							$columns = ['serie', 'descripcion_serie', 'usuarios_.autor'];
							$weights = ['3', '2', '1'];
						}

						$query = "SELECT COUNT(series.id) as total FROM series 
									LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
									WHERE MATCH(" . implode(',', $columns) . ") 
									AGAINST ('$consulta' IN BOOLEAN MODE)";
						$resultado = $conexion_tabla->query($query);
						$data = $resultado->fetch_assoc();
						$totalRegistros = $data['total'];

						if (isset($_GET['paginaSeries'])) {
							$pagina = $_GET['paginaSeries'];
						} else {
							$pagina = 1;
						}

						$por_Pagina = 8;
						$empieza = ($pagina - 1) * $por_Pagina;

						$matches_query = '';
						$weights_query = '';
						for ($i = 0; $i < sizeof($columns); $i++) {
							$matches_query = $matches_query . "MATCH (" . $columns[$i] . ") AGAINST ('" . $consulta . "' IN BOOLEAN MODE) AS " . end(explode(".", $columns[$i])) . "_match, ";
							$weights_query = $weights_query . end(explode(".", $columns[$i])) . "_match*" . $weights[$i] . "+";
						}
						$matches_query = substr($matches_query, 0, -2);
						$weights_query = substr($weights_query, 0, -1);

						$query = "SELECT series.*," . $matches_query . "
									FROM series
									LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
									WHERE MATCH(" . implode(',', $columns) . ") AGAINST ('$consulta' IN BOOLEAN MODE)
									ORDER BY (" . $weights_query . ") DESC
									LIMIT $empieza, $por_Pagina";
						$resultado = $conexion_tabla->query($query);

						if ($resultado->num_rows > 0) {

							while ($row = $resultado->fetch_assoc()) {
								$tipo = 'foto';
								$ids = [$row['idUsuario'], $row['id'], 0];
								$descripcion = $row['serie'];
								$buttons['Explorar'] = '../colecciones/serie.php?idSerie=' . $idSerie;
								$ref = 'serie';
								include('../zComponents/mediaCard.php');
							} //end WHILE
						} else {
							echo "<div class='col-md-3 col-sm-6 col-xs-12 work-item'>No hay series con " . $consulta . ". </div><br><br>";
						}
						?>

					</div>
				</div>

			<?php
				$queryVar = 'paginaSeries';
				include('../includes/carrusel.php');
			} //END IF
			?>

			<h2 class="heading relative heading-small upperacase bottom-line style-2 left-align"><?php
																									if ($tipo == "todos") {
																										echo "Elementos";
																									} else {
																										echo $tipo . "s";
																									}
																									?></h2>
			<div class="row recent-posts">
				<div id="portfolio-container" class="works-grid small-gutter with-title">

					<?php
					$consulta = $_REQUEST['consulta'];
					$columns = [];
					$weights = [];
					if ($_GET["avanzada_autor"]) {
						$columns[] = "usuarios_.autor";
						$weights[] = "0.5";
					}
					if ($_GET["avanzada_serie"]) {
						$columns[] = "series.serie";
						$weights[] = "1";
					}
					if ($_GET["avanzada_seriedescripcion"]) {
						$columns[] = "descripcion_img";
						$weights[] = "2";
					}
					if (empty($columns)) {
						$columns = ['lugar', 'usuarios_.autor', 'descripcion_img', 'descriptores'];
						$weights = ['0.5', '2', '3', '1'];
					}

					if (isset($_GET['pagina'])) {
						$pagina = $_GET['pagina'];
					} else {
						$pagina = 1;
					}

					$por_Pagina = 12;
					$empieza = ($pagina - 1) * $por_Pagina;

					//Contar total de resultados para dividir en páginas
					if ($tipo == "todos") {
						$query = "SELECT COUNT(items.id) as total FROM items 
									LEFT JOIN usuarios_ ON idUsuario=usuarios_.id
									LEFT JOIN series ON idSerie=series.id
									WHERE MATCH(" . implode(',', $columns) . ") 
									AGAINST ('$consulta' IN BOOLEAN MODE)";
					} else {
						$query = "SELECT COUNT(items.id) as total FROM items
									LEFT JOIN usuarios_ ON idSerie=usuarios_.id
									LEFT JOIN series ON idSerie=series.id
									WHERE MATCH(" . implode(',', $columns) . ")
									AGAINST ('$consulta' IN BOOLEAN MODE) AND tipo='$tipo'";
					}
					$resultado = $conexion_tabla->query($query);

					$data = $resultado->fetch_assoc();
					$totalRegistros = $data['total'];


					//Seleccionar registros a buscar en la página actual
					$matches_query = '';
					$weights_query = '';
					for ($i = 0; $i < sizeof($columns); $i++) {
						$matches_query = $matches_query . "MATCH (" . $columns[$i] . ") AGAINST ('" . $consulta . "' IN BOOLEAN MODE) AS " . end(explode(".", $columns[$i])) . "_match, ";
						$weights_query = $weights_query . end(explode(".", $columns[$i])) . "_match*" . $weights[$i] . "+";
					}
					$matches_query = substr($matches_query, 0, -2);
					$weights_query = substr($weights_query, 0, -1);
					if ($tipo == "todos") {
						$query = "SELECT items.*," . $matches_query . "
    								FROM items
									LEFT JOIN usuarios_ ON idSerie=usuarios_.id
									LEFT JOIN series ON idSerie=series.id
    								WHERE MATCH(" . implode(',', $columns) . ") AGAINST ('$consulta' IN BOOLEAN MODE)
    								ORDER BY (" . $weights_query . ") DESC
    								LIMIT $empieza, $por_Pagina";
					} else {
						$query = "SELECT items.*," . $matches_query . "
    								FROM items
									LEFT JOIN usuarios_ ON idSerie=usuarios_.id
									LEFT JOIN series ON idSerie=series.id
    								WHERE MATCH(" . implode(',', $columns) . ") AGAINST ('$consulta' IN BOOLEAN MODE)
    								AND tipo='$tipo'
    								ORDER BY (" . $weights_query . ") DESC
										LIMIT $empieza, $por_Pagina";
					}

					$resultado = $conexion_tabla->query($query);

					if ($resultado->num_rows > 0) {

						while ($row = $resultado->fetch_assoc()) {
							$tipo = $row['tipo'];
							$ids = [$row['idUsuario'], $row['idSerie'], $row['id']];
							$descripcion = $row['descripcion_img'];
							$href = "detalles.php?consulta=" . urlencode($_GET['consulta']) . "&id=" . $id;
							include('../zComponents/mediaCard.php');
						} //end WHILE
					} else {
						echo "No hay elementos con " . $consulta . ". <br><br>";
					}
					?>

				</div>
			</div>

			<?php
			$queryVar = 'pagina';
			include('../includes/carrusel.php')
			?>

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