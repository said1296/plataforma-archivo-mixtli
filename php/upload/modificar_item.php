<?php
session_start();
include("../zUtils/conexion_tabla.php");


$id = $_GET['id'];
$query = "SELECT * FROM items WHERE id = '$id'";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();

if ($_SESSION['tipo'] != 1 or $_SESSION['id'] != $row['idUsuario']) {
    header("Location: index.php");
	exit;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Guardar imágenes | Preservación Digital</title>
    <?php
    include("../components/head.php")
    ?>

</head>

<body>


    <?php
    include('../components/header.php');
    $tipo = 'foto';
    $titleBig = "MODIFICAR";
    $ids = [$row['idUsuario'], $row['idSerie'], 0];
    include('../components/banner.php');
    ?>

    <section>
        <div class="container mt-70 mb-50 alimentar-imagen">
            <div class="row">
                <div class="">
                    <center>
                        <!-- Forma item -->
                        <form action="./actions/modificar_item.php" id="forma_item" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="serie" value="<?php echo $row['serie'] ?>">

                            <?php
                            $ids = [$row['idUsuario'], $row['idSerie'], $id];
                            include('../components/media.php');
                            ?>
                </div>


                <div class="col-md-6">
                    <label class="left text-left">Fecha: <i>(formato dd/mm/aaaa)</i> </label>
                    <input type="text" REQUIRED id="fecha" name="fecha" placeholder="Ingrese su fecha de toma..." value="<?php echo $row["fecha"] ?>" /><br /><br />
                </div>

                <div class="col-sm-6">
                    <label class="left text-left">Lugar de toma: </label>
                    <input type="text" REQUIRED id="lugar" name="lugar" placeholder="Ingrese el lugar de toma..." value="<?php echo $row["lugar"] ?>" /><br /><br />
                </div>

                <div class="col-sm-6">
                    <label class="left text-left">Descriptores: </label>
                    <input type="text" REQUIRED data-role="tagsinput" id="descriptores" name="descriptores" placeholder="Ingrese sus descriptores..." value="<?php echo $row["descriptores"] ?>" /><br /><br />
                </div>

                <div class="col-sm-6">
                    <label class="left text-left">Personajes: </label>
                    <input type="text" id="personajes" name="personajes" placeholder="Ingrese los personajes que aparecen en la imagen..." value="<?php echo $row["personajes"] ?>" /><br /><br />
                </div>

                <div class="col-md-12">
                    <label class="left text-left">Descripciones: </label>
                    <input type="text" REQUIRED id="descripcion_img" name="descripcion_img" placeholder="Describe la imagen..." value="<?php echo $row["descripcion_img"] ?>" />
                </div>

                <?php
                $query = "SELECT * FROM descripciones WHERE ColeccionesID='$id'";
                $descripciones = $conexion_tabla->query($query);
                $i = 0;
                while ($descripcion = $descripciones->fetch_assoc()) {
                ?>

                    <div class="col-md-11 mb-0 mt-0 pt-0 pb-0">
                        <input type="text" REQUIRED id="descripcion_img" name="descripcion-<?php echo $descripcion['DescripcionID'] ?>" placeholder="Describe la imagen..." value="<?php echo $descripcion["Descripcion"] ?>" />
                    </div>
                    <div class="col-md-1 mb-0 mt-0 pt-0 pb-0">
                        <a class="btn btn-sm btn-red" href="series_eliminar_descripcion.php?<?php echo $_SERVER['QUERY_STRING'] ?>&DescripcionID=<?php echo $descripcion['DescripcionID'] ?>"> X </a>
                    </div>

                <?php
                    $i++;
                } //END WHILE
                ?>

                <div class="col-md-12">
                    <div class="text-medium" id="respuesta"></div><br /><br />
                    <div id="vista-previa"></div>
                </div>

                <div class="col-md-6">
                    <a onClick='javascript:history.go(-1)' class="btn btn-lg btn-black">Regresar</a>
                </div>

                <div class="col-md-6">
                    <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-foto" value="Guardar" />
                </div>
                </form>

                </center>
            </div>
        </div>
    </section>

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
    <script type="text/javascript" src="../../themes/js/alimentar_serie_uploads.js"></script>

</body>

</html>