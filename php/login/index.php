<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Iniciar sesión | Preservación Digital Comunitaria</title>
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
   include("../zComponents/header.php");
   ?>

   <!--- WRAPP --->
   <div class="main-wrapper oh">

      <!--- BANNER SECTION --->
      <section class="page-title style-3 text-center" style="background-image:url(../../themes/img/sections/login.jpg)">
         <div class="container relative clearfix">
            <div class="title-holder">
               <div class="title-text">
                  <h1 class="uppercase" style='color: #fff'>Inicia sesión</h1>
                  <ol class="breadcrumb">
                     <li><a>Para subir sus series</a></li>
                  </ol>
               </div>
            </div>
            <div class="local-scroll hidden-sm hidden-xs">
               <a href="#intro" class="scroll-down"> <i class="fa fa-angle-down"></i></a>
            </div>
         </div>
      </section>
      <!--- END BANNER SECTION --->


      <section class="section-wrap page-404">
         <div class="container">
            <div class="row text-center">
               <div class="col-md-6 col-md-offset-3">
                  <h2 class="mb-50">Para iniciar sesión ingrese su usuario y contraseña</h2>

                  <div class="alert alert-info fade in alert-dismissible" role="alert">

                     <?php

                     if (isset($errorLogin)) {
                        echo $errorLogin;
                     }

                     ?>
                  </div>
                  <br />

                  <form class="relative" action="proceso_usuario.php" method="POST">
                     <label for="input-label" class="text-left">Nombre de usuario</label>
                     <input type="text" REQUIRED name="usuario" value="" placeholder="Ingrese su nombre de usuario..." /><br /><br />
                     <label for="input-label">Contraseña</label>
                     <input type="password" REQUIRED name="contrasena" value="" placeholder="Ingrese su contraseña..." /><br /><br />
                     <input type="submit" value="Iniciar sesión" class="btn btn-lg btn-red" />
                  </form>
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