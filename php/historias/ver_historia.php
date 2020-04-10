<?php
	$idHistoria=$_GET['idHistoria'];
	if($idHistoria==''){
      $query_historia = "SELECT * FROM historias where mes=1";
	}else{
      $query_historia = "SELECT * FROM historias where id='$idHistoria'";  
   }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


   <?php
   include("../zUtils/conexion_tabla.php");

   $resultado_historia = $conexion_tabla->query($query_historia);
   $row_historia = $resultado_historia->fetch_assoc();
   ?>


   <title> <?php echo $row_historia['titulo']  ?> | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
   <?php
   include("../zComponents/head.php");
   ?>
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">

   <div class="loader-mask">
      <div class="loader">
         "Cargando..."
      </div>
   </div>

   <?php
   include('../zComponents/header.php')
   ?>

   <!--- WRAPP --->
   <div class="main-wrapper oh">

      <section class="page-title style-2 text-center">
         <div class="container relative clearfix">
            <div class="title-holder">
               <div class="title-text">
                  <span class="uppercase historia_titulo"><?php echo $row_historia['titulo']  ?></span>
                  <br>
                  <span class="uppercase historia_autor"><?php echo $row_historia['autor']  ?></span>
                  <br>
                  <span class="uppercase historia_fecha"><?php echo $row_historia['fecha']  ?></span>
               </div>
            </div>
         </div>
      </section>

      <section class="section-wrap">
         <div class="container">
            <div class="row">
               <div style="display:flex; flex-wrap: wrap; justify-content:center;" class="works-grid small-gutter with-title">

                  <?php
                  $id_historias = $row_historia['id'];
                  $query = "SELECT * FROM historias_imgs WHERE id_historias='$id_historias' ORDER BY posicion ASC";
                  $resultadoImagenes = $conexion_tabla->query($query);

                  if ($resultadoImagenes->num_rows > 0) {
                     while ($rowImagenes = $resultadoImagenes->fetch_assoc()) {
                        $id_colecciones = $rowImagenes['id_colecciones'];
                        $query = "SELECT * FROM items WHERE id='$id_colecciones'";
                        $resultado = $conexion_tabla->query($query);
                        $row = $resultado->fetch_assoc();

                        $tipo='foto';
                        $id=$row['id'];
                        $ids=[$row['idUsuario'], $row['idSerie'], $id];
                        $descripcion=$row['descripcion_img'];
                        $href="../colecciones/detalles.php?consulta=".urlencode($_GET['consulta'])."&id=".$id;
                        include('../zComponents/mediaCard.php');
                     } //end while
                  } else {
                     echo "No hay imágenes para esta historia.";
                  }

                  ?>

                  <div class="historia_texto col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-12">
                     <?php
                     echo nl2br($row_historia['texto']);
                     ?>
                  </div>


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

   </div>

   <!--- END WRAPP --->
   <script type="text/javascript" src="../../themes/js/jquery.min.js"></script>
   <script type="text/javascript" src="../../themes/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../../themes/js/plugins.js"></script>
   <script type="text/javascript" src="../../themes/js/jquery.themepunch.tools.min.js"></script>
   <script type="text/javascript" src="../../themes/js/jquery.themepunch.revolution.min.js"></script>
   <script type="text/javascript" src="../../themes/js/rev-slider.js"></script>
   <script type="text/javascript" src="../../themes/js/scripts.js"></script>

</body>

</html>