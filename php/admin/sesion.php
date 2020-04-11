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
  <title>Subir colecciones | Preservación Digital Comunitaria</title>
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
  
  <header class="nav-type-1">
   <nav class="navbar navbar-fixed-top">
    <div class="navigation-overlay dark">
	 <div class="container-fluid semi-fluid relative">
      <div class="row">
	   
       <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
		 <span class="sr-only">Toggle navigation</span>
		 <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
		 <span class="icon-bar"></span>
		</button>
	   </div>
       
       <div class="logo-container">
	    <div class="logo-wrap local-scroll">
		 <a href="../../"> <img class="logo" src="../../themes/img/gral/logo.png" alt="Preservación"> </a>
		</div>
	   </div>
       
       <div class="col-md-9 nav-wrap right">
	    <div class="collapse navbar-collapse" id="navbar-collapse">
		 <ul class="nav navbar-nav local-scroll navbar-right">
		  <li class="dropdown">
		   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyecto</a>
		   <ul class="dropdown-menu">
            <li><a href="../acerca-del-proyecto/index.php#descripcion">Descripción del proyecto</a></li>
            <li><a href="../acerca-del-proyecto/index.php#comoFunciona">¿Cómo funciona?</a></li>
			<li><a href="../acerca-del-proyecto/index.php#FAQ">FAQ</a></li>
			<li><a href="../acerca-del-proyecto/index.php#condiciones">Condiciones de uso</a></li>
			<li><a href="../acerca-del-proyecto/index.php#privacidad">Aviso de privacidad</a></li>
		   </ul>
		  </li>
          <li class="dropdown">
		   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Colecciones</a>
		   <ul class="dropdown-menu">
            <li><a href="../explorar/">Explorar</a></li>
            <li><a href="../colecciones/">Usa la colección</a></li>
			<li><a href="../login/">Sube tu colección</a></li>
		   </ul>
		  </li>
          <li class="dropdown">
		   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Historias</a>
		   <ul class="dropdown-menu">
            <li><a href="../historia-del-mes/">Historia del mes</a></li>
            <li><a href="../historias-anteriores/">Historias anteriores</a></li>
		   </ul>
		  </li>
          <li> <a href="../documentos/">Documentos</a> </li>
          <li> <a href="../comunidad-del-archivo/">Comunidad</a> </li>
          <li> <a href="../contacto/">Contáctanos</a> </li>
         </ul>
        </div>
       </div>
       
      </div>
     </div>
    </div>
   </nav>
  </header>
  
  <!--- WRAPP --->
  <div class="main-wrapper oh">
  
   <!--- BANNER SECTION --->
   <section class="page-title style-3 text-center" style="background-image:url(../../themes/img/sections/login.jpg)">
    <div class="container relative clearfix">
	 <div class="title-holder">
	  <div class="title-text">
	   <h1 class="uppercase">Colecciones</h1>
	    <ol class="breadcrumb">
		 <li>
          <a>
           <?php
		    echo "<br>Bienvenido\n<br>";
		    echo "&nbsp;" . $_SESSION['u_usuario'];
		   ?>
          </a>
         </li>
		</ol>
	  </div>
	 </div>
	 <div class="local-scroll hidden-sm hidden-xs">
	  <a href="#colections" class="scroll-down"> <i class="fa fa-angle-down"></i></a>
	 </div>
	</div>
   </section>
   <!--- END BANNER SECTION --->
	
   
   <section class="section-wrap" id="colections">
    <div class="container">
	 
     <div class="row">
      <div class="col-sm-6">
       <a href="subir_coleccion.php" class="btn btn-md btn-stroke">Agregar nueva colección</a>
      </div>
      <div class="col-sm-6 text-right">
       <a href="cerrar_sesion.php" class="btn btn-md btn-dark">
	    <?php echo "Salir";
		?>
       </a>
      </div>
     </div>
     <br />
     <div class="bg-light">
     <div class="row">
      <div class="col-sm-12">
       <h3 class="mb-0">&nbsp;&nbsp; Colecciones del usuario <?php echo "&nbsp;" . $_SESSION['u_usuario']; ?> </h3>
      </div>
     </div>
     </div>
     
    <div class="container">
     <div class="row">
      <br />
      <table class="table table-striped">
       <tbody>
       
       <thead>
       <tr>
        <th class="col-md-2"> <h5 class="widget-title">Colección</h5></th>
        <th class="col-md-2"> <h5 class="widget-title">Imagen</h5></th>
        <th class="col-md-1"> <h5 class="widget-title">Lugar</h5></th>
        <th class="col-md-3"> <h5 class="widget-title">Descripción</h5></th>
        <th colspan="2" class="col-md-2"> <h5 class="widget-title">Operaciones</h5></th>
       </tr> 
       </thead> 
       
       <?php
		  include("../zUtils/conexion_tabla.php");
		  //include_once 'fotografias.php';
		 
		  // cantidad de registros por pagina
		  $por_Pagina = 10;
		  
		   if(isset($_GET['pagina'])){
		 	  $pagina = $_GET['pagina'];
		   }else{
			  $pagina = 1;
		    }
			
		  //la página inicia en 0 y se multiplica $por_Pagina
		  $empieza = ($pagina - 1) * $por_Pagina;
		  
		  //seleccionar los registros de la tabla gestion_imagen con LIMIT
		  $query = "SELECT * FROM items WHERE autor='$_SESSION[u_usuario]' LIMIT $empieza, $por_Pagina ";
		  
		  //$resultado = mysqli_query($conexion_tabla, $query);
		  //$query = "SELECT * FROM gestion_imagen";
		  $resultado = $conexion_tabla->query($query);
		    while($row = $resultado->fetch_assoc()){
				
				
       ?>
           
       <tr>
        <td class="col-md-2"> <?php echo $row['coleccion']; ?></td>
        <td class="col-md-2" style=" width:120px; height:100px"> <img height="100px" width="120px" src="data:image/jpg;base64,<?php echo base64_encode($row['img1']);  ?>"/> <br /><br /></td>
        <td class="col-md-1"> <?php echo $row['lugar']; ?></td>
        <td class="col-md-3"> <?php echo $row['descripcion']; ?></td>
        <td class="col-md-1"> <a href="modificar_imagen.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark">Modificar</a> </td>
        <td class="col-md-1"> <a href="eliminar_registro.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-red">Eliminar</a></td>
       </tr>
       
       <?php
		 // end while;
		 }
	   ?>
       
       </tbody>
      </table>
      
      <div>
       <?php
		// seleccionar todo
		$query = "SELECT * FROM gestion_imagen";
		$resultado = $conexion_tabla->query($query);
		//$resultado = mysqli_query($conexion_tabla, $query);
					
		//contar el total de registros
		$totalRegistros = mysqli_num_rows($resultado);
					
		//usando ciel para dividir el total de resgitros
		$totalPaginas = ceil($totalRegistros / $por_Pagina);
					
		// link a la primera página
		echo "<ul>";
		echo "<li class='btn btn-md btn-light'><a href='sesion.php?pagina=1'>".'Primera '."</a></li>";
					
		for($i=1; $i<=$totalPaginas; $i++){
			echo "<li class='btn btn-md btn-light'><a href='sesion.php?pagina=".$i."'>".$i."</a></li>";
			}
		// link a la ultima página
		echo "<li class='btn btn-md btn-light'><a  href='sesion.php?pagina=$totalPaginas'>".'Última '."</a></li>";
		echo "</ul>";
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