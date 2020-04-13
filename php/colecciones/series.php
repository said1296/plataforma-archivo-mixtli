<?php
session_start();
include("../zUtils/conexion_tabla.php");

if (isset($_GET['grupo'])) {
    $grupo = urldecode($_GET['grupo']);

    $titleSmall = 'Grupo';
    $titleBig = $grupo;

    if (!isset($_GET['consulta'])) {
        $query = "SELECT * FROM series WHERE grupo = '$grupo'";
    } else {
        $columns = ['serie', 'descripcion_serie', 'usuarios_.autor'];
        $weights = ['3', '2', '1'];
        $consulta = $_GET['consulta'];

        $matches_query = '';
        $weights_query = '';
        for ($i = 0; $i < sizeof($columns); $i++) {
            $matches_query = $matches_query . "MATCH (" . $columns[$i] . ") AGAINST ('" . $consulta . "' IN BOOLEAN MODE) AS " . end(explode(".", $columns[$i])) . "_match, ";
            $weights_query = $weights_query . end(explode(".", $columns[$i])) . "_match*" . $weights[$i] . "+";
        }
        $matches_query = substr($matches_query, 0, -2);
        $weights_query = substr($weights_query, 0, -1);

        $query = "SELECT series.*, $matches_query
                        FROM series
                        LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
                        WHERE MATCH(" . implode(',', $columns) . ") AGAINST ('$consulta' IN BOOLEAN MODE)
                        AND grupo='$grupo'
                        ORDER BY ($weights_query)";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <script>
        if (performance.navigation.type == 2) {
            location.reload(true);
        }
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <?php

    $SelectGrupo = $_GET['grupo'];


    ?>


    <title>Grupo <?php echo $SelectGrupo  ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
    <?php
    include("../components/head.php");
    ?>

    <link rel="stylesheet" href="../../themes/css/misc.css" />
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">

    <div class="loader-mask">
        <div class="loader">
            "Cargando..."
        </div>
    </div>

    <?php
    include('../components/header.php');
    include('../components/banner.php');
    ?>

    <section class="section-wrap" style='padding-top: 0px;'>

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
            <div class="col-sm-12">
                <div class="nav-search type-2">
                    <form action="series.php" method="get">
                        <input type='hidden' name='grupo' value=<?php echo urlencode($grupo) ?>>
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
            <div class="row recent-posts">
                <div id="portfolio-container" class="works-grid small-gutter with-title">

                    <?php
                    $resultado = $conexion_tabla->query($query);

                    if ($resultado->num_rows > 0) {

                        while ($row = $resultado->fetch_assoc()) {
                            $tipo = 'foto';
                            $ids = [$row['idUsuario'], $row['id'], 0];
                            $descripcion = $row['serie'];
                            $href = '../colecciones/serie.php?idSerie=' . $idSerie;
                            $buttons['Explorar'] = '../colecciones/serie.php?idSerie=' . $idSerie;
                            $ref = 'serie';
                            include('../components/mediaCard.php');
                        } //end while

                    } else {
                        echo "No hay series en este grupo.";
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