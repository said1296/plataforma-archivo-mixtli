<?php
    session_start();
    $idSerie=$_GET['idSerie'];
    include('../zUtils/conexion_tabla.php');
    $query = "SELECT series.*, usuarios_.autor FROM series 
                LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
                WHERE series.id='$idSerie'";
    $resultado = $conexion_tabla->query($query);
    $row_serie = $resultado->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Serie <?php echo $row_serie['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>


    <meta property="og:title" content="Serie <?php echo $row_serie['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen" />
    <meta property="og:description" content="Descripción de la página" />
    <meta property="og:image" content="http://.jpg" />
    <meta property="og:url" content="http://" />

    <?php
    include("../zComponents/head.php");
    ?>
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">



    <?php
    include('../zComponents/header.php');
    $tipo = 'foto';
    $idUsuario = $row_serie['idUsuario'];
    $idSerie = $row_serie['id'];
    $id = "0";
    $titleSmall = "Colección";
    $titleBig = $row_serie['serie'];
    $ids=[$idUsuario, $idSerie, $id];
    include('../zComponents/banner.php');
    ?>

    <section class="section-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a onClick="javascript:history.go(-1)">
                        <li class="btn btn-sm btn-dark">Regresar</li>
                    </a>
                    <h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0 mt-30"><?php echo $row_serie['coleccion']; ?></h2>
                    <p>
                        <i class="bg-success text-success">&nbsp;Autor: &nbsp;</i>
                        <?php echo $row_serie['autor']; ?> <br />
                        <i class="bg-success text-success">&nbsp;Grupo: &nbsp;</i>
                        <?php echo $row_serie['grupo']; ?> <br />
                        <i class="bg-success text-success">&nbsp;Serie: &nbsp;</i>
                        <?php echo $row_serie['serie']; ?> <br />
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row recent-posts">
                <br><br>
                <div id="portfolio-container" class="works-grid small-gutter with-title">

                    <?php
                    include("../zUtils/conexion_tabla.php");

                    $query = "SELECT * FROM items WHERE idSerie='$idSerie'";

                    $resultado = $conexion_tabla->query($query);
                    while ($row = $resultado->fetch_assoc()) {
                        $ids=[$row['idUsuario'], $row['idSerie'], $row['id']];
                        $descripcion=$row['descripcion_img'];
                        $tipo=$row['tipo'];
                        include('../zComponents/mediaCard.php');	
                    }
                    ?>
                </div>
            </div>
        </div>


        <?php
        include("../zComponents/comentarios_series.php")
        ?>

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