<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Administradores | Preservación Digital Comunitaria</title>
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
  
  <div class="main-wrapper oh">
   <section class="hero-wrap text-center" style="background-image:url(../../themes/img/sections/admin.jpg)">
    <div class="container container-full-height">
     <div class="hero-holder">
      <div class="hero-message text-rotator">
       
       <section class="section-wrap page-404">
    <div class="container">
     <div class="row text-center">
	  <div class="col-md-6 col-md-offset-3">
	   <h2 class="mb-50">Para iniciar sesión ingrese su usuario y contraseña</h2>
       
       <div class="alert alert-info fade in alert-dismissible" role="alert">

			   <?php
			
				if(isset($errorLogin)){
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
       
       
       
      </div>
     </div>
    </div>
   </section>
   
   <footer class="footer footer-type-5 fixed">
	<div class="bottom-footer">
	 <div class="container-fluid semi-fluid">
	  <div class="row">
	   
       <div class="col-sm-5 copyright">
	    <span>© 2019 Archivo Mixtli  |  por <a href="https://www.facebook.com/sociedaddeexperimentacion/" target="_blank" >Sociedad de experimentación</a></span>
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