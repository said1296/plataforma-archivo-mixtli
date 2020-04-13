<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Registro | Preservación Digital Comunitaria</title>
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

   <!--- WRAPP --->
   <div class="main-wrapper oh">

      <section class="page-title style-2 text-center">
         <div class="container relative clearfix">
            <div class="title-holder">
               <div class="title-text">
                  <h1 class="uppercase">Registro</h1>
                  <ol class="breadcrumb">
                     <li> Ingrese sus datos para poder generar su colección.</li>
                  </ol>
               </div>
            </div>
         </div>
      </section>


      <section class="section-wrap" id="register">
         <div class="container">
            <div class="row">

               <div class="col-sm-6">
                  <div class="about-description">
                     <h4>Registro</h4>
                     <div id="success" class="no-margin-lr">
                        <?php

                        if (isset($registered)) {
                           echo $registered;
                        }

                        if (isset($errorLogin)) {
                           echo $errorLogin;
                        }

                        ?>
                     </div>

                     <form class="relative" action="./acciones/proceso_guardar.php" method="POST" enctype="multipart/form-data">


                        <label for="input-label" class="text-left">Nombre completo</label>
                        <input type="text" id="autor" REQUIRED name="autor" value="" placeholder="Ingrese su nombre completo..." /><br /><br />

                        <label for="input-label" class="text-left">Nombre de usuario o pseudonimo</label>
                        <input type="text" id="usuario" REQUIRED name="usuario" value="" placeholder="Ingrese su nombre de usuario..." /><br /><br />

                        <label for="input-label" class="text-left">Contraseña</label>
                        <input type="password" id="contrasena" REQUIRED name="contrasena" value="" placeholder="Ingrese su contraseña..." /><br /><br />

                        <label for="input-label" class="text-left">Correo electrónico</label>
                        <input type="text" id="email" REQUIRED name="email" value="" placeholder="Ingrese su correo electrónico..." /><br /><br />

                        <label for="input-label" class="text-left">Edad</label>
                        <input type="text" id="edad" REQUIRED name="edad" value="" placeholder="Ingrese su edad..." /><br /><br />

                        <label for="input-label" class="text-left">Género</label>
                        <select id="genero" name="genero">
                           <option value="">Seleccione su género</option>
                           <option value="masculino">Masculino</option>
                           <option value="femenino">Femenino</option>
                        </select>
                  </div>
               </div>

               <div class="col-sm-6">
                  <p>&nbsp;</p>
                  <label for="input-label" class="text-left">Ocupación</label>
                  <input type="text" id="ocupacion" REQUIRED name="ocupacion" value="" placeholder="Ingrese su ocupación..." /><br /><br />

                  <label for="input-label" class="text-left">¿Quién eres y qué te gusta?</label>
                  <input type="text" id="soy" REQUIRED name="soy" value="" placeholder="¿Quién eres y qué te gusta?..." /><br /><br />

                  <label for="input-label" class="text-left">Lugar de origen</label>
                  <input type="text" id="origen" REQUIRED name="origen" value="" placeholder="Cual es su lugar de origen..." /><br /><br />

                  <label for="input-label" class="text-left">Lugar de residencia</label>
                  <input type="text" id="residencia" REQUIRED name="residencia" value="" placeholder="Ingrese su lugar de residencia..." /><br /><br />

                  <label for="input-label" class="text-left">Seleccione su imagen de perfil</label>
                  <input class="button" type="file" REQUIRED id="imagenUser" name="imagenUser" />
                  <br /><br />

                  <a id="open_segundo" href="#segundo" class="btn btn-lg btn-red">Siguiente</a>
               </div>

            </div>

            <div class="row" id="segundo">
               <div class="col-sm-6">
                  <br /><br />
                  <h5>Define tu colección</h5>

                  <label for="input-label" class="text-left">Nombre de colección</label>
                  <input type="text" id="coleccion" REQUIRED name="coleccion" value="" placeholder="Asigna un nombre a tu colección" /><br /><br />

                  <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="btn" value="Guardar" />


               </div>
               <div class="col-sm-6">
                  <br /><br /><br /><br />
                  <label for="input-label" class="text-left">Seleccione una imagen que defina tu colección</label>
                  <input class="button" type="file" REQUIRED id="img1" name="img1" />

                  </form>
                  <br /><br />

               </div>

            </div>


         </div>
      </section>

      <section class="call-to-action bg-light">
         <div class="container">
            <div class="row">
               <div class="col-sm-9 col-xs-12">
                  <h2 class="mb-0">Si ya cuentas con un usuario, puedes iniciar sesión</h2>
               </div>
               <div class="col-sm-3 col-xs-12 cta-button">
                  <a href="../login/" class="btn btn-lg btn-dark">Iniciar sesión</a>
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