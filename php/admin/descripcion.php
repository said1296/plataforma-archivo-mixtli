<?php
session_start();
if($_SESSION['tipo']!=1){
    header ("Location: index.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Historias | Preservación Digital Comunitaria</title>
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
        include('../zComponents/header.php');
        include("../zUtils/conexion_tabla.php");
	?>
  
  <!--- WRAPP --->
        <div class="main-wrapper oh">"
        <section class="page-title style-3 text-center" style="background-image:url('<?php
                        $query = "SELECT * FROM proyecto WHERE campo='imagen'";
                        $resultado = $conexion_tabla->query($query);
                        $row = $resultado->fetch_assoc();
                        echo $row['valor'];
                ?>')">
            <div class="container relative clearfix">
            <div class="title-holder">
            <div class="title-text">
            <h1 class="uppercase">Cambiar imagen</h1>
                <form action="procesando_modificacion_descripcion.php?campo=imagen" id="forma-proyecto-imagen" method="POST" enctype="multipart/form-data" style="margin: 0 auto; width:250px;">
                    <input type="file" id="proyecto-img" name="proyecto-img" class="btn" style="border-radius:6px;">
                    <input class="btn btn-lg btn-red mt-50" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-foto" value="Guardar"/>
                </form
            </div>
            </div>
            <div class="local-scroll hidden-sm hidden-xs">
            <a href="#descripcion" class="scroll-down"> <i class="fa fa-angle-down"></i></a>
            </div>
            </div>
        </section>
   
        <div class="container mt-100">
            <div class="row">
                <div class="col-md-12 uppercase">
                    <h1> Descripción del proyecto </h1>
                </div>
                <div class="col-md-12 uppercase">
                    <form action="procesando_modificacion_descripcion.php?campo=descripcion" id="forma-proyecto-descripcion" method="POST" enctype="multipart/form-data">
                        <textarea form="forma-proyecto-descripcion" id="descripcion" name ="descripcion" style="height:250px;"><?php
                            $query = "SELECT * FROM proyecto WHERE campo='descripcion'";
                            $resultado = $conexion_tabla->query($query);
                            $row = $resultado->fetch_assoc();
                            echo ($row['valor']);
                        ?></textarea>
                        <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-foto" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mt-100">
            <div class="row">
                <div class="col-md-12 uppercase">
                        <h1> Objetivos </h1>
                </div>
                <table class="table table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <th class="col-md-1 col-sm-1 col-xs-3"> <h5 class="widget-title">Posicion</h5></th>
                                <th class="col-md-11 col-sm-11 col-xs-9"> <h5 class="widget-title">Valor</h5></th>
                            </tr> 
                        </thead> 
                    </tbody>
                </table>
            </div>
        </div>
   
        <div class="container">
            <div class="row">
                <form action="procesando_modificacion_descripcion.php?campo=objetivo" id="forma-proyecto-objetivos" method="POST">
                    <div id="container-objetivos">
                        <?php
                            $query = "SELECT * FROM proyecto WHERE campo='objetivo' ORDER BY posicion ASC";
                            $resultado = $conexion_tabla->query($query);
                            $i=1;
                            while($row = $resultado->fetch_assoc()){
                        ?>
                        <div id="objetivos-"<?php echo $i ?>>
                            <div class="col-md-1 col-sm-1 col-xs-3" style="clear:both;">
                                <input REQUIRED type="number" class="placeholder" placeholder="#" id="objetivos-posicion-<?php echo $i?>" name="posicion-<?php echo $i?>" value="<?php echo $row['posicion'] ?>">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-5">
                                <input REQUIRED type="text" class="placeholder" placeholder="Objetivo" id="objetivos-valor-<?php echo $i?>" name="valor-<?php echo $i?>" value="<?php echo $row['valor']; ?>">
                            </div>

                            <div class="col-md-1 col-sm-2 col-xs-4">
                                <a href="procesando_modificacion_descripcion.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-black">Eliminar</a>
                            </div>
                        </div>

                        <?php
                                $i=$i+1;
                            } //END WHILE
                        ?>
                    </div>
                    <div class="ocultar mt-10 col-md-12" id="error-objetivos" style="color:red; font-size:20px;"></div>
                    <input class="btn btn-lg btn-red mt-10" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-objetivos" value="Guardar"/>
                    <input type="button" class="btn btn-lg mt-10" style="width:170px; background-color:green;" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" id="agregar-objetivo" value="Agregar"/>
                </form>
            </div>
        </div>

        <div class="container mt-100">
            <div class="row">
                <div class="col-md-12 uppercase">
                        <h1> ¿Qué es la preservación digital comunitaria? </h1>
                </div>
                <table class="table table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <th class="col-md-1 col-sm-1 col-xs-3"> <h5 class="widget-title">Posicion</h5></th>
                                <th class="col-md-11 col-sm-11 col-xs-9"> <h5 class="widget-title">Valor</h5></th>
                            </tr> 
                        </thead> 
                    </tbody>
                </table>
            </div>
        </div>
   
        <div class="container">
            <div class="row">
                <form action="procesando_modificacion_descripcion.php?campo=preservacion" id="forma-proyecto-preservacion" method="POST">
                    <div id="container-preservacion">
                        <?php
                            $query = "SELECT * FROM proyecto WHERE campo='preservacion' ORDER BY posicion ASC";
                            $resultado = $conexion_tabla->query($query);
                            $i=1;
                            while($row = $resultado->fetch_assoc()){
                        ?>
                        <div id="preservacion-"<?php echo $i ?>>
                            <div class="col-md-1 col-sm-1 col-xs-3" style="clear:both;">
                                <input REQUIRED type="number" class="placeholder" placeholder="#" id="preservacion-posicion-<?php echo $i?>" name="posicion-<?php echo $i?>" value="<?php echo $row['posicion'] ?>">
                            </div>
                            <div class="col-md-10 col-sm-9 col-xs-5">
                                <input REQUIRED type="text" class="placeholder" placeholder="¿Qué es la preservación digital comunitaria?" id="preservacion-valor-<?php echo $i?>" name="valor-<?php echo $i?>" value="<?php echo $row['valor']; ?>">
                            </div>

                            <div class="col-md-1 col-sm-2 col-xs-4">
                                <a href="procesando_modificacion_descripcion.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-black">Eliminar</a>
                            </div>
                        </div>

                        <?php
                                $i=$i+1;
                            } //END WHILE
                        ?>
                    </div>
                    <div class="ocultar mt-10 col-md-12" id="error-preservacion" style="color:red; font-size:20px;"></div>
                    <input class="btn btn-lg btn-red mt-10" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-preservacion" value="Guardar"/>
                    <input type="button" class="btn btn-lg mt-10" style="width:170px; background-color:green;" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" id="agregar-preservacion" value="Agregar"/>
                </form>
            </div>
        </div>



        
        <div class="container mt-100">
            <div class="row">
                <div class="col-md-12 uppercase">
                        <h1> FAQ </h1>
                </div>
                <table class="table table-striped">
                    <tbody>
                        <thead>
                            <tr>
                                <th class="col-md-1"> <h5 class="widget-title">Posicion</h5></th>
                                <th class="col-md-5"> <h5 class="widget-title">Pregunta</h5></th>
                                <th class="col-md-6"> <h5 class="widget-title">Respuesta</h5></th>
                            </tr> 
                        </thead> 
                    </tbody>
                </table>
            </div>
        </div>
   
        <div class="container">
            <div class="row">
                <form action="procesando_modificacion_descripcion.php?campo=faq" id="forma-proyecto-faq" method="POST">
                    <div id="container-faq">
                        <?php
                            $query = "SELECT * FROM proyecto WHERE campo='faq' ORDER BY posicion ASC";
                            $resultado = $conexion_tabla->query($query);
                            $i=1;
                            while($row = $resultado->fetch_assoc()){
                        ?>
                        <div id="faq-<?php echo $i ?>">
                            <div class="col-md-1 col-sm-1 col-xs-1" style="clear:both;">
                                <input REQUIRED type="number" class="placeholder" placeholder="#" id="faq-posicion-<?php echo $i?>" name="posicion-<?php echo $i?>" value="<?php echo $row['posicion'] ?>">
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <input REQUIRED type="text" class="placeholder" placeholder="Pregunta" id="faq-valor-<?php echo $i?>" name="valor-<?php echo $i?>" value="<?php echo $row['valor']; ?>">
                            </div>

                            <div class="col-md-5 col-sm-5 col-xs-5">
                                <input REQUIRED type="text" class="placeholder" placeholder="Respuesta" id="faq-respuesta-<?php echo $i?>" name="respuesta-<?php echo $i?>" value="<?php echo $row['respuesta'];?>">
                            </div>

                            <div class="col-md-1 col-sm-1 col-xs-1">
                                <a href="procesando_modificacion_descripcion.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-black">Eliminar</a>
                            </div>
                        </div>

                        <?php
                                $i=$i+1;
                            } //END WHILE
                        ?>
                    </div>
                    <div class="ocultar mt-10 col-md-12" id="error-faq" style="color:red; font-size:20px;"></div>
                    <input class="btn btn-lg btn-red mt-10" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-faq" value="Guardar"/>
                    <input type="button" class="btn btn-lg mt-10" style="width:170px; background-color:green;" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" id="agregar-faq" value="Agregar"/>
                </form>
            </div>
        </div>



        <div class="container mt-100">
            <div class="row">
                <div class="col-md-12 uppercase">
                    <h1> Condiciones de uso </h1>
                </div>
                <div class="col-md-12 uppercase">
                    <form action="procesando_modificacion_descripcion.php?campo=condiciones" id="forma-proyecto-condiciones" method="POST" enctype="multipart/form-data">
                        <textarea form="forma-proyecto-condiciones" id="condiciones" name ="condiciones" style="height:250px;"><?php
                            $query = "SELECT * FROM proyecto WHERE campo='condiciones'";
                            $resultado = $conexion_tabla->query($query);
                            $row = $resultado->fetch_assoc();
                            echo ($row['valor']);
                        ?></textarea>
                        <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-foto" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mt-100 mb-100">
            <div class="row">
                <div class="col-md-12 uppercase">
                    <h1> Aviso de privacidad </h1>
                </div>
                <div class="col-md-12 uppercase">
                    <form action="procesando_modificacion_descripcion.php?campo=aviso" id="forma-proyecto-aviso" method="POST" enctype="multipart/form-data">
                        <textarea form="forma-proyecto-aviso" id="aviso" name ="aviso" style="height:250px;"><?php
                            $query = "SELECT * FROM proyecto WHERE campo='aviso'";
                            $resultado = $conexion_tabla->query($query);
                            $row = $resultado->fetch_assoc();
                            echo ($row['valor']);
                        ?></textarea>
                        <input class="btn btn-lg btn-red" data-animate-in="preset:slideInUpShort;duration:1000ms;delay:1000ms;" data-x="center" data-y="bottom" data-offsety="50" type="submit" id="submit-foto" value="Guardar"/>
                    </form>
                </div>
            </div>
        </div>
   
   <section class="call-to-action bg-light">
	<div class="container">
	 <div class="row">
	  <div class="col-sm-9 col-xs-12">		
	   <h2 class="mb-0">Consulta virtual de imágenes digitales que contribuye al conocimiento de nuestra cultura.</h2>
	  </div>
	  <div class="col-sm-3 col-xs-12 cta-button">
	   
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
	    <span> © 2019 Archivo Mixtli  |  por <a href="https://www.facebook.com/sociedaddeexperimentacion/" target="_blank" >Sociedad de experimentación</a> </span>
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