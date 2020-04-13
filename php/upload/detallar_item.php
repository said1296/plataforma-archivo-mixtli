<?php

session_start();

include("../zUtils/conexion_tabla.php");

$idSerie = $_GET['idSerie'];
$query = "SELECT * FROM series WHERE id = '$idSerie'";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();

if (!$row['idUsuario'] == $_SESSION['id'] and !$_SESSION['tipo'] == '1') {
  header("Location: /php/login/index.php");
	exit;
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Guardar imágenes | Preservación Digital</title>
  <?php
  include("../components/head.php");
  ?>
</head>

<body>

  <?php
  include('../components/header.php');
  $tipo = 'foto';
  $idUsuario = $row['idUsuario'];
  $idSerie = $row['id'];
  $id = "0";
  $titleSmall = "Añadir";
  $titleBig = $row['serie'];
  $ids=[$idUsuario, $idSerie, $id];
  include('../components/banner.php');
  ?>

  <section>
    <div class="container mt-70 mb-50 alimentar-imagen">
      <div class="row">
        <div class="">
          <center>

            <!-- Forma foto -->
            <form action="./actions/crear_item.php" id="forma_foto" method="POST" enctype="multipart/form-data">

              <!-- Hidden post requests -->
              <input type="hidden" REQUIRED id="idSerie" name="idSerie" value="<?php echo $row['id'] ?>" />
              <input type="hidden" REQUIRED id="img" name="img" />
              <input type="hidden" REQUIRED id="filename" name="filename" />
              <input type="hidden" REQUIRED id="file" name="file" />


              <!-- Formulario -->
              <div class="col-md-6 mb-20">
                <img id="img-display">
              </div>
              <div class="col-md-6">
                <label class="left text-left">Fecha de toma: <i>(formato dd/mm/aaaa)</i> </label>
                <input type="text" REQUIRED id="fecha" name="fecha" placeholder="Ingrese su fecha de toma..." value="" /><br /><br />
              </div>

              <div class="col-sm-6">
                <label class="left text-left">Lugar de toma: </label>
                <input type="text" REQUIRED id="lugar" name="lugar" placeholder="Ingrese el lugar de toma..." value="" /><br /><br />
              </div>

              <div class="col-sm-6">
                <label class="left text-left">Descriptores: </label>
                <input type="text" REQUIRED data-role="tagsinput" id="descriptores" name="descriptores" placeholder="Ingrese sus descriptores..." value="" /><br /><br />
              </div>

              <div class="col-sm-6">
                <label class="left text-left">Personajes: </label>
                <input type="text" id="personajes" name="personajes" placeholder="Ingrese los personajes que aparecen en la imagen..." value="" /><br /><br />
              </div>

              <div class="col-md-12">
                <label class="left text-left">Descripción de la imagen: </label>
                <input type="text" REQUIRED id="descripcion_img" name="descripcion_img" placeholder="Describe la imagen..." value="" /><br /><br />
              </div>
              <!-- ID ASIGNADO       
          <div class="col-sm-6">
            <label class="left text-left">Id asignado:  </label>
            <input type="text" REQUIRED id="id_asignado" name="id_asignado" placeholder="Ingrese un id asignado..." value=""/><br /><br />
          </div> -->

              <div class="col-md-12">
                <div class="text-medium" id="respuesta"></div><br /><br />
                <div id="vista-previa"></div>
              </div>

              <div class="col-md-6">
                <a class="btn btn-lg btn-black" id="descartar">
                  Descartar
                </a>
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