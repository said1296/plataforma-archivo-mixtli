<?php
session_start();
include("../zUtils/conexion_tabla.php");

$idSerie = $_GET['idSerie'];
$query = "SELECT * FROM series WHERE id = '$idSerie' LIMIT 1";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();

if ($_SESSION['tipo'] != 1 and $_SESSION['id']!=$row['idUsuario']) {
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
  include("../components/header.php");
  $tipo = 'foto';
  $idUsuario = $row['idUsuario'];
  $idSerie = $row['id'];
  $id = "0";
  $titleSmall = "Modificar";
  $titleBig = $row['serie'];
  $ids = [$idUsuario, 0];
  include('../components/banner.php');
  ?>

  <section>
    <div class="container mt-70 mb-50 alimentar-imagen">
      <div class="row">
        <div class="">
          <center>

            <!-- Forma foto -->
            <form style='color:black;' action="./actions/modificar_serie.php" id="forma_foto" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="idSerie" value="<?php echo $row['id'] ?>">

              <!-- Formulario -->
              <div class="col-md-6 mb-20">
                <img id="vista_previa" src="../../uploads/<?php echo implode("/", [$idUsuario, $idSerie, $id]) ?>.jpg" />
              </div>
              <div class="col-md-6">
                <label class="left text-left">Nombre de la serie: <i>(formato dd/mm/aaaa)</i> </label>
                <input type="text" REQUIRED id="serie" name="serie" placeholder="Nombre de la serie..." value="<?php echo $row["serie"] ?>" /><br /><br />
              </div>

              <div class="col-sm-6">
                <label class="left text-left">Descripción de la serie: </label>
                <input type="text" REQUIRED id="descripcion_serie" name="descripcion_serie" placeholder="Describa la serie..." value="<?php echo $row["descripcion_serie"] ?>" /><br /><br />
              </div>

              <div class="col-sm-6">
                <label class="left text-left">Grupo de la serie:</label>
                <select REQUIRED id="grupo" name="grupo">
                  <option value="Las fiestas del pueblo" <?php
                                                          if ($row["grupo"] == "Las fiestas del pueblo") {
                                                            echo "selected";
                                                          }
                                                          ?>>Las fiestas del pueblo</option>
                  <option value="Vida cotidiana" <?php
                                                  if ($row["grupo"] == "Vida cotidiana") {
                                                    echo "selected";
                                                  }
                                                  ?>>Vida cotidiana</option>
                  <option value="Paisaje y Arquitectura" <?php
                                                          if ($row["grupo"] == "Paisaje y Arquitectura") {
                                                            echo "selected";
                                                          }
                                                          ?>>Paisaje y Arquitectura</option>
                </select>
              </div>

              <div class="col-sm-12 mt-20 mb-50">
                <label class="">Cambiar imagen de la serie:</label>
                <input class="button" type="file" id="imgSerie_cambio" name="imgSerie" />
              </div>

              <div class="col-md-6 mb-50">
                <a onClick='javascript:history.go(-1)' class="btn btn-lg btn-black">Regresar</a>
              </div>

              <div class="col-md-6">
                <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-foto" value="Guardar" />
              </div>

            </form>

          </center>
        </div>
      </div>
    </div>
  </section>

  </div>


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