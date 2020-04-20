<?php

session_start();

include("../utils/conexion_tabla.php");

$idSerie = $_REQUEST['idSerie'];
$query = "SELECT * FROM series WHERE id = '$idSerie'";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();

if (!$row['idUsuario'] == $_SESSION['id'] and !$_SESSION['tipo'] == '1') {
  header("Location: /php/login/index.php");
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Añadir | Preservación Digital</title>
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
    $titleSmall = "Añadir a serie";
    $titleBig = $row['serie'];
    $ids=[$idUsuario, $idSerie, $id];
    include('../components/banner.php');
    ?>

    <section class="section-wrap" id="register">

      <div class="container">
        <div class="row">
          <div class="">
            <center>

              <div class="btn-group col-md-4 col-md-offset-4 mb-30 tipo-archivo" data-toggle="buttons">
                <label class="btn btn-primary form-check-label active">
                  <input class="form-check-input" type="radio" name="tipo_archivo" id="tipo_foto" autocomplete="off" checked>
                  Foto
                </label>
                <label class="btn btn-primary form-check-label">
                  <input class="form-check-input" type="radio" name="tipo_archivo" id="tipo_video" autocomplete="off">
                  Video
                </label>
                <label class="btn btn-primary form-check-label">
                  <input class="form-check-input" type="radio" name="tipo_archivo" id="tipo_audio" autocomplete="off">
                  Audio
                </label>
              </div>

              <!-- Forma foto -->
              <form onsubmit="imageStore();return false;" accept="image/*" id="forma_foto" method="POST" enctype="multipart/form-data">
                <div class="col-md-3 col-md-offset-5">
                  <label class="left text-left">Seleccione las imágenes: </label>
                  <input type="file" id="img-files" name="imgs[]" multiple REQUIRED />
                </div>
                <div class="col-md-2 col-md-offset-5">
                  <br><br>
                  <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-fotos" value="Guardar" />
                </div>
              </form>

              <!-- Forma video -->
              <form class="ocultar" action="guardar_video_serie.php" id="forma_video" method="POST" enctype="multipart/form-data">

                <!-- Hidden post requests -->
                <input class="" type="hidden" REQUIRED id="usuario" name="usuario" value="<?php echo $_SESSION['u_usuario'] ?>" />
                <input type="hidden" REQUIRED id="autor" name="autor" value="<?php echo $row['autor'] ?>" />
                <input type="hidden" REQUIRED id="coleccion" name="coleccion" value="<?php echo $row['coleccion'] ?>" />
                <input type="hidden" REQUIRED id="serie" name="serie" value="<?php echo $row['serie'] ?>" />
                <input type="hidden" REQUIRED id="grupo" name="grupo" value="<?php echo $row['grupo'] ?>" />
                <input type="hidden" REQUIRED id="descripcion_serie" name="descripcion_serie" value="<?php echo $row['descripcion_serie'] ?>" />
                <br><br><br>


                <!-- Formulario -->
                <div class="col-md-6">
                  <label class="left text-left">Fecha: <i>(formato dd/mm/aaaa)</i> </label>
                  <input type="text" REQUIRED id="fecha" name="fecha" placeholder="Ingrese su fecha de toma..." value="" /><br /><br />
                </div>

                <div class="col-md-6">
                  <label class="left text-left">Lugar de toma: </label>
                  <input type="text" REQUIRED id="lugar" name="lugar" placeholder="Ingrese el lugar de toma..." value="" /><br /><br />
                </div>

                <div class="col-md-12">
                  <label class="left text-left">Descripción del video: </label>
                  <input type="text" REQUIRED id="descripcion_img" name="descripcion_img" placeholder="Describe la imagen..." value="" /><br /><br />
                </div>

                <div class="col-md-6">
                  <label class="left text-left">Descriptores: </label>
                  <input type="text" REQUIRED data-role="tagsinput" id="descriptores-video" name="descriptores" placeholder="Ingrese sus descriptores..." value="" /><br /><br />
                </div>

                <div class="col-md-6">
                  <label class="left text-left">Personajes: </label>
                  <input type="text" id="personajes" name="personajes" placeholder="Ingrese los personajes que aparecen en la imagen..." value="" /><br /><br />
                </div>
                <!-- ID ASIGNADO       
        <div class="col-sm-6">
          <label class="left text-left">Id asignado:  </label>
          <input type="text" REQUIRED id="id_asignado" name="id_asignado" placeholder="Ingrese un id asignado..." value=""/><br /><br />
        </div> -->

                <div class="col-md-12 mb-0">
                  <label class="left text-left">Link del video (YouTube, Vimeo o Archive): </label>
                  <input class="mb-0" type="text" id="link" name="link" placeholder="Ingrese el link del video" value="" REQUIRED /><br /><br />
                  <label class="left text-left mt-0 error_link ocultar" id="error_link">Usar un link válido de YouTube, Vimeo o Archive</label>
                </div>

                <div class="col-md-6">
                  <div class="text-medium" id="respuesta"></div><br /><br />
                  <div id="vista-previa"></div>
                </div>

                <div class="col-md-6 col-md-offset-3">
                  <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit_video" value="Guardar" />
                </div>
              </form>

              <!-- Forma audio -->
              <form class="ocultar" action="guardar_audio_serie.php" id="forma_audio" method="POST" enctype="multipart/form-data">

                <!-- Hidden post requests -->
                <input class="" type="hidden" REQUIRED id="usuario" name="usuario" value="<?php echo $_SESSION['u_usuario'] ?>" />
                <input type="hidden" REQUIRED id="autor" name="autor" value="<?php echo $row['autor'] ?>" />
                <input type="hidden" REQUIRED id="coleccion" name="coleccion" value="<?php echo $row['coleccion'] ?>" />
                <input type="hidden" REQUIRED id="serie" name="serie" value="<?php echo $row['serie'] ?>" />
                <input type="hidden" REQUIRED id="grupo" name="grupo" value="<?php echo $row['grupo'] ?>" />
                <input type="hidden" REQUIRED id="descripcion_serie" name="descripcion_serie" value="<?php echo $row['descripcion_serie'] ?>" />
                <br><br><br>


                <!-- Formulario -->
                <div class="col-md-6">
                  <label class="left text-left">Fecha: <i>(formato dd/mm/aaaa)</i> </label>
                  <input type="text" REQUIRED id="fecha" name="fecha" placeholder="Ingrese su fecha de toma..." value="" /><br /><br />
                </div>

                <div class="col-md-6">
                  <label class="left text-left">Lugar de toma: </label>
                  <input type="text" REQUIRED id="lugar" name="lugar" placeholder="Ingrese el lugar de toma..." value="" /><br /><br />
                </div>

                <div class="col-md-12">
                  <label class="left text-left">Descripción del video: </label>
                  <input type="text" REQUIRED id="descripcion_img" name="descripcion_img" placeholder="Describe la imagen..." value="" /><br /><br />
                </div>

                <div class="col-md-6">
                  <label class="left text-left">Descriptores: </label>
                  <input type="text" REQUIRED data-role="tagsinput" REQUIRED id="descriptores-audio" name="descriptores" placeholder="Ingrese sus descriptores..." value="" /><br /><br />
                </div>

                <div class="col-md-6">
                  <label class="left text-left">Personajes: </label>
                  <input type="text" id="personajes" name="personajes" placeholder="Ingrese los personajes que aparecen en la imagen..." value="" /><br /><br />
                </div>

                <!-- ID ASIGNADO       
        <div class="col-sm-6">
          <label class="left text-left">Id asignado:  </label>
          <input type="text" REQUIRED id="id_asignado" name="id_asignado" placeholder="Ingrese un id asignado..." value=""/><br /><br />
        </div> -->

                <div class="col-md-3">
                  <label class="left text-left">Subir archivo o link de audio (Soundcloud o Archive.org): </label>
                  <label class="left text-left mt-0 error_link ocultar" id="error_link_audio">&nbsp&nbspUsar un link válido de Soundcloud</label>
                  <input type="file" id="audio-file" name="img" placeholder="Ingrese el archivo de audio" value="" /><br /><br />
                </div>
                <div class="col-md-9 mt-10">
                  <input type="text" id="audio-link" name="link" placeholder="Ingrese un link del audio" value="" />
                </div>

                <div class="col-md-12">
                  <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit_audio" value="Guardar" />
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