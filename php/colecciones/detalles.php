<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <?php
    $id = $_REQUEST['id'];

    include("../utils/conexion_tabla.php");
    $query = "SELECT items.*, series.serie, series.grupo, series.coleccion, usuarios_.autor FROM items
                LEFT JOIN usuarios_ ON items.idUsuario=usuarios_.id
                LEFT JOIN series ON items.idSerie=series.id
                WHERE items.id = '$id'
                LIMIT 1";

    $resultado = $conexion_tabla->query($query);
    $row = $resultado->fetch_assoc();


    ?>
    <title>Colección <?php echo $row['coleccion']; ?> Serie <?php echo $row['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>


    <meta property="og:title" content="Colección <?php echo $row['coleccion']; ?> Serie <?php echo $row['serie']; ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen" />
    <meta property="og:description" content="Descripción de la página" />
    <meta property="og:image" content="http://.jpg" />
    <meta property="og:url" content="http://" />

    <?php
    include("../components/head.php");
    ?>
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">

    <?php
    include('../components/header.php');
    $tipo = $row['tipo'];
    $idUsuario = $row['idUsuario'];
    $idSerie = $row['idSerie'];
    $titleSmall = "Colección";
    $titleBig = $row['coleccion'];
    $ids = [$idUsuario, $idSerie, 0];
    include('../components/banner.php');
    ?>

    <section class="section-wrap">
        <div class="container">
            <div class="row">

                <div class="col-sm-6" style="font-size:16px;">
                    <h2 class="heading relative heading-small uppercase bottom-line style-2 left-align mb-0"><?php echo $row['coleccion']; ?></h2>
                    <?php echo $row['descripcion_img']; ?> <br /><br />

                    <i class="bg-success text-success">&nbsp;ID: &nbsp;</i>
                    <?php echo $row['id']; ?> <br />
                    <i class="bg-success text-success">&nbsp;Autor: &nbsp;</i>
                    <?php echo $row['autor']; ?> <br />
                    <i class="bg-success text-success">&nbsp;Grupo: &nbsp;</i>
                    <?php echo $row['grupo']; ?> <br />
                    <i class="bg-success text-success">&nbsp;Serie: &nbsp;</i>
                    <?php echo $row['serie']; ?> <br />
                    <i class="bg-success text-success">&nbsp;Fecha: &nbsp;</i>
                    <?php echo $row['fecha']; ?> <br />
                    <i class="bg-success text-success">&nbsp;Lugar: &nbsp;</i>
                    <?php
                    $lugares = $row['lugar'];
                    $lugares = explode(",", $lugares);
                    foreach ($lugares as $lugar) {
                        echo $lugar . " / ";
                    }
                    ?>
                    <i id="añadir-lugares" style="color:#3c763d; font-size:22px; cursor:pointer; position:relative; top:4px;" class="icon_plus_alt"></i>
                    <div class="mt-10 ocultar añadir" id="añadir-lugares-div">
                        <form action="./acciones/crear_lugares.php" method="post">
                            <input type="hidden" name="idItem" value="<?php echo $id ?>">
                            <input type="text" REQUIRED data-role="tagsinput" id="lugares" name="lugares" placeholder="Separados por comas..." value="" />
                            <button type="submit" class="btn btn-success" style="background:none;border:none;"><i style="color:#3c763d; font-size:30px; cursor:pointer; position:relative;" class="icon_check_alt"></i></button>
                            <button type="button" id="cancelar-lugares" class="btn btn-danger" style="background:none;border:none;"><i style="color:#ef5659; font-size:30px; cursor:pointer; position:relative;left:-20px;" class="icon_close_alt"></i></button>
                        </form>
                    </div>
                    <br>
                    <i class="bg-success text-success">&nbsp;Personajes: &nbsp;</i>
                    <?php
                    $personajes = $row['personajes'];
                    $personajes = explode(",", $personajes);
                    foreach ($personajes as $personaje) {
                        echo $personaje . " / ";
                    }
                    ?>
                    <i id="añadir-personajes" style="color:#3c763d; font-size:22px; cursor:pointer; position:relative; top:4px;" class="icon_plus_alt"></i>
                    <div class="mt-10 ocultar añadir" id="añadir-personajes-div">
                        <form action="./acciones/crear_personajes.php" method="post">
                            <input type="hidden" name="idItem" value="<?php echo $id ?>">
                            <input type="text" REQUIRED data-role="tagsinput" id="personajes" name="personajes" placeholder="Separados por comas..." value="" />
                            <button type="submit" class="btn btn-success" style="background:none;border:none;"><i style="color:#3c763d; font-size:30px; cursor:pointer; position:relative;" class="icon_check_alt"></i></button>
                            <button type="button" id="cancelar-personajes" class="btn btn-danger" style="background:none;border:none;"><i style="color:#ef5659; font-size:30px; cursor:pointer; position:relative;left:-20px;" class="icon_close_alt"></i></button>
                        </form>
                    </div>
                    <br>
                    <i class="bg-success text-success">&nbsp;Descriptores: &nbsp;</i>
                    <?php
                    $descriptores = $row['descriptores'];
                    $descriptores = explode(",", $descriptores);
                    foreach ($descriptores as $descriptor) {
                        echo "<span class='tag label label-info' style='display:inline-block;margin-right:2px;margin-top:10px;'>" . $descriptor . "</span>";
                    }
                    ?>
                    <i id="añadir-descriptores" style="color:#3c763d; font-size:22px; cursor:pointer; position:relative; top:6px;" class="icon_plus_alt"></i> <br />
                    <div class="mt-10 ocultar añadir" id="añadir-descriptores-div">
                        <form action="./acciones/crear_descriptores.php" method="post">
                            <input type="hidden" name="idItem" value="<?php echo $id ?>">
                            <input type="text" REQUIRED data-role="tagsinput" class="descriptores" id="descriptores" name="descriptores" placeholder="Separados por comas..." value="" />
                            <button type="submit" class="btn btn-success" style="background:none;border:none;"><i style="color:#3c763d; font-size:30px; cursor:pointer; position:relative;" class="icon_check_alt"></i></button>
                            <button type="button" id="cancelar-descriptores" class="btn btn-danger" style="background:none;border:none;"><i style="color:#ef5659; font-size:30px; cursor:pointer; position:relative;left:-20px;" class="icon_close_alt"></i></button>
                        </form>
                    </div>
                </div>

                <?php
                    $ids=[$idUsuario, $idSerie, $id];
                    include('../components/media.php');
                ?>

                <span class="bottom-line" style-2></span>
                <?php
                echo $row['descripcion_img'] . "<br>";
                $query = "SELECT * FROM descripciones WHERE idItem='$id'";
                $resultado_descripciones = $conexion_tabla->query($query);
                while ($row_descripciones = $resultado_descripciones->fetch_assoc()) {
                    echo $row_descripciones['descripcion'] . "<br>";
                }
                ?>
                <div id="div-añadir-descripcion" class="mt-40">
                    <form id='añadir-descripcion' action="./acciones/crear_descripcion.php" method='post'>
                        <input type="hidden" name="idItem" value="<?php echo $id ?>">
                        <div id="campos-añadir">
                            <textarea name="descripcion" placeholder="Añada una descripcion..." id="añadir-descripcion-textarea" form='añadir-descripcion' style="resize:none;height:80px;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" style="background:green;border:none;width:100%;height:25px;position:relative;top:-26px;border-radius:0 0 20px 20px;text-transform: none; font-family: 'Raleway', sans-serif;font-size:12px;line-height:10px;">Añadir</button>
                    </form>
                </div>
            </div>



        </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <div class="right">
                        <p>&nbsp;
                            <ul class="text-center">
                                <?php
                                $ref = $_REQUEST['ref'];
                                parse_str($_SERVER['QUERY_STRING'], $queryArray);
                                unset($queryArray['id']);
                                unset($queryArray['ref']);
                                $queryString = http_build_query($queryArray);
                                if ($row['tipo'] == 'foto') {
                                    echo '<a href="../colecciones/viewimg.php?id=' . $row['id'] . '"><li class="btn btn-sm btn-light">Descargar</li></a>';
                                } elseif ($row['tipo'] == "video") {
                                    echo '<a target="_blank" href="' . $row['link'] . '"><li class="btn btn-sm btn-light">Link original</li></a>';
                                } elseif ($row['tipo'] == 'audio') {
                                    if (empty($row['img'])) {
                                        echo '<a target="_blank" href="' . $row['link'] . '"><li class="btn btn-sm btn-light">Link original</li></a>';
                                    }
                                }
                                ?>
                                <a onClick='javascript:history.go(-1)'>
                                    <li class="btn btn-sm btn-dark">Regresar</li>
                                </a>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("../components/comentarios_items.php");
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