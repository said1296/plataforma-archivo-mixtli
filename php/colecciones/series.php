<?php
session_start();
include("../utils/conexion_tabla.php");

if (isset($_GET['grupo'])) {
    $grupo = urldecode($_GET['grupo']);
    $queryKey = 'grupo';

    $titleSmall = 'Grupo';
    $titleBig = $grupo;

    $query = "SELECT * FROM series WHERE grupo = '$grupo'";
    $mensajeError='No hay series en este grupo';
}elseif(isset($_GET['idUsuario'])){
    $idUsuario=$_GET['idUsuario'];
    $queryKey='idUsuario';

    $query="SELECT * FROM usuarios_ WHERE id=$idUsuario";
    $resultado=$conexion_tabla->query($query);
    $row=$resultado->fetch_assoc();
    $titleBig=$row['autor'];
    $titleSmall=$row['coleccion'];
    $tipo='foto';
    $ids=[$idUsuario, 0];

    $query="SELECT * FROM series WHERE idUsuario=$idUsuario";
    $mensajeError='Este colaborador no tiene series';
}

if(isset($_GET['consulta'])){
    if($queryKey=='grupo'){
        $columns = ['serie', 'descripcion_serie', 'usuarios_.autor'];
        $weights = ['3', '2', '1'];
    }elseif($queryKey=='idUsuario'){
        $columns = ['serie', 'descripcion_serie'];
        $weights = ['3', '2'];
    }

    $consulta = $_GET['consulta'];

    $matches_query = '';
    $weights_query = '';
    for ($i = 0; $i < sizeof($columns); $i++) {
        $matches_query = $matches_query . "MATCH (" . $columns[$i] . ") AGAINST ('" . $consulta . "' IN BOOLEAN MODE) AS " . end(explode(".", $columns[$i])) . "_match, ";
        $weights_query = $weights_query . end(explode(".", $columns[$i])) . "_match*" . $weights[$i] . "+";
    }
    $matches_query = substr($matches_query, 0, -2);
    $weights_query = substr($weights_query, 0, -1);

    if($queryKey=='grupo'){
        $query = "SELECT series.*, $matches_query
        FROM series
        LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
        WHERE MATCH(" . implode(',', $columns) . ") AGAINST ('$consulta' IN BOOLEAN MODE)
        AND grupo='$grupo'
        ORDER BY ($weights_query)";
    }elseif($queryKey=='idUsuario'){
        $query = "SELECT series.*, $matches_query
        FROM series
        LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
        WHERE MATCH(" . implode(',', $columns) . ") AGAINST ('$consulta' IN BOOLEAN MODE)
        AND idUsuario='$idUsuario'
        ORDER BY ($weights_query)";
    }

    $mensajeError='No hay resultados';

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
    <title> Series | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
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
                    <form onsubmit="handleConsulta(event)">
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
                            $buttons['Explorar'] = '../colecciones/serie.php?idSerie=' . $idSerie;
                            $ref = 'serie';
                            include('../components/mediaCard.php');
                        } //end while

                    } else {
                        echo $mensajeError;
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

    <script>
    function handleConsulta(e) {
        e.preventDefault();
        var consulta = e.target[0].value
        if(consulta){
            location.replace('series.php?<?php echo $queryKey."=".$_GET[$queryKey]?>&consulta='+consulta)
        }else{
            location.replace('series.php?<?php echo $queryKey."=".$_GET[$queryKey]?>')
        }
    }
    </script>

</body>

</html>