<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Explorar | Preservación Digital Comunitaria</title>
   <?php
   include("../components/head.php");
   ?>
</head>

<body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">

   <div class="loader-mask">
      <div class="loader">
         "Cargando..."
      </div>
   </div>

   <?php
   include('../components/header.php')
   ?>

   <div class="main-wrapper oh">
      <section class="hero-wrap text-center" style="background-image:url(../../themes/img/sections/explorar.jpg)">
         <div class="container container-full-height">
            <div class="hero-holder">
               <div class="hero-message text-rotator">
                  <h1><span class="rotate ">Archivo Mixtli, Preservación comunitaria, Preservación colectiva</span></h1>
                  <h2 class="hero-subtitle hidden-xs">para la persistencia de nuestra imagen.</h2>
                  <div class="buttons-holder mt-30">
                     <?php
                     $fiestas = "Las fiestas del pueblo";
                     $vida = "Vida cotidiana";
                     $paisaje = "Paisaje y Arquitectura";

                     ?>

                     <a href="../colecciones/series.php?grupo=<?php echo $fiestas ?>" class="btn btn-lg btn-blue">Las fiestas del pueblo</a>
                     <a href="../colecciones/series.php?grupo=<?php echo $vida ?>" class="btn btn-lg btn-red">Vida cotidiana</a>
                     <a href="../colecciones/series.php?grupo=<?php echo $paisaje ?>" class="btn btn-lg btn-yellow">Arquitectura y paisaje</a>
                  </div>

               </div>
            </div>
         </div>
      </section>

      <footer class="footer footer-type-5 fixed">
         <div class="bottom-footer">
            <div class="container-fluid semi-fluid">
               <div class="row">

                  <div class="col-sm-5 copyright">
                     <span>© 2019 Archivo Mixtli | por <a href="https://www.facebook.com/sociedaddeexperimentacion/" target="_blank">Sociedad de experimentación</a></span>
                  </div>

                  <div class="col-sm-7 footer-socials">
                     <div class="social-icons text-right">
                        <img src="../../themes/img/gral/fonca.png" />
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </footer>

      <div id="back-to-top">
         <a href="#top"><i class="fa fa-angle-up"></i></a>
      </div>

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