<?php
session_start();

if (!isset($_SESSION['id'])) {
  header("Location: /php/login/index.php");
}

include("../zUtils/conexion_tabla.php");

$idUsuario = $_SESSION['id'];
$query = "SELECT * FROM usuarios_ WHERE id = '$idUsuario'";
$resultado = $conexion_tabla->query($query);
$row = $resultado->fetch_assoc();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Añadir serie | Preservación Digital</title>
  <?php
  include("../components/head.php");
  ?>
</head>

<body>
  <?php
  include('../components/header.php');
  $tipo = 'foto';
  $titleSmall = 'Añadir serie';
  $titleBig = $row['coleccion'];
  $ids = [$idUsuario, "0"];
  include('../components/banner.php');
  ?>
  <section class="section-wrap" style="padding-top:70px;" id="register">
    <div class="container">
      <div class="row">
        <form class="relative" id="formulario" action="./actions/crear_serie.php" method="POST" enctype="multipart/form-data">
        
          <input class="" type="hidden" REQUIRED id="coleccion" name="coleccion" value="<?php echo $row['coleccion'] ?>" />

          <div class="col-sm-6">
            <label class="left text-left">Nombre de la serie:</label>
            <input type="text" REQUIRED id="serie" name="serie" placeholder="Nombre de la serie..." value="" />
          </div>

          <div class="col-sm-6">
            <label class="left text-left">En que grupo deseas clasificar está serie:</label>
            <select REQUIRED id="grupo" name="grupo">
              <option value="">Selecciona el grupo</option>
              <option value="Las fiestas del pueblo">Las fiestas del pueblo</option>
              <option value="Vida cotidiana">Vida cotidiana</option>
              <option value="Paisaje y arquitectura">Paisaje y arquitectura</option>
            </select>
          </div>

          <div class="col-md-12">
            <label class="left text-left">Descripción de la serie:</label>
            <input type="text" REQUIRED id="descripcion_serie" name="descripcion_serie" placeholder="Describe la serie..." value="" /><br /><br />
          </div>

          <div class="col-md-12 text-center">
            <label>Selecciona una imagen que defina tu serie</label>
          </div>

          <div class="col-md-2 col-md-offset-5">
            <input class="button" type="file" REQUIRED id="imgSerie" name="imgSerie" /><br />
          </div>

          <div class="col-md-12 text-center mt-20">
            <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="btn" value="Guardar" />
        </form>
      </div>
    </div>
  </section>

</body>

</html>