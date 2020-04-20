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
  <title>Imágenes | Preservación Digital Comunitaria</title>
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
      <?php
      include("../utils/conexion_tabla.php");

      $id_historia = $_GET['id_historia'];

      $query = "SELECT * FROM historias WHERE id='$id_historia'";
   
      $resultado = $conexion_tabla->query($query);
      $row = $resultado->fetch_assoc();
      echo "<h1 style='font-size:30px;' class='uppercase'>".$row['titulo']."</h1>"
      ?>
      <br>
      <h3 style="font-size:15px;" class="uppercase">Imágenes</h3>
	  </div>
	 </div>
	</div>
   </section>
	
   
   <section class="section-wrap" id="colections">
    <div class="container">
	 
     <div class="row">
      <div class="col-sm-6">
       <a href="historias_imagenes_series.php?id_historia=<?php echo $_GET['id_historia'] ?>" class="btn btn-md btn-stroke">Agregar imagen</a>
      </div>
      <div class="col-sm-6 text-right">
       <a href="historias.php" class="btn btn-md btn-dark">Regresar</a>
      </div>
     </div>
     <br />
     
     
    <div class="container">
     <div class="row">
      <br />
      <table class="table table-striped"  id="tabla-imgs">
       <tbody>
       
       <thead>
         <tr>
            <th class="col-md-1"> <h5 class="widget-title">Posición</h5></th>
            <th class="col-md-2"> <h5 class="widget-title">Colección</h5></th>
            <th class="col-md-2"> <h5 class="widget-title">Imagen</h5></th>
            <th class="col-md-1"> <h5 class="widget-title">Autor</h5></th>
            <th class="col-md-1"> <h5 class="widget-title">Serie</h5></th>
            <th class="col-md-1"> <h5 class="widget-title">Fecha</h5></th>
            <th class="col-md-1"> <h5 class="widget-title">Lugar</h5></th>
            <th class="col-md-4"> <h5 class="widget-title">Descripción</h5></th>
            <th colspan="2" class="col-md-2"> <h5 class="widget-title">Operaciones</h5></th>
         </tr> 
       </thead>

       <?php		 
		  // cantidad de registros por pagina
		  $por_Pagina = 20;
		  
		   if(isset($_GET['pagina'])){
		 	  $pagina = $_GET['pagina'];
		   }else{
			  $pagina = 1;
		    }
			
		  //la página inicia en 0 y se multiplica $por_Pagina
        $empieza = ($pagina - 1) * $por_Pagina;

		  //seleccionar los registros de la tabla gestion_imagen con LIMIT
          $query = "SELECT * FROM historias_items WHERE idHistoria='$id_historia' ORDER BY posicion ASC LIMIT $empieza, $por_Pagina";
		  
		  //$resultado = mysqli_query($conexion_tabla, $query);
          //$query = "SELECT * FROM gestion_imagen";
          
          $resultado = $conexion_tabla->query($query);
          $i=1;
		    while($row = $resultado->fetch_assoc()){

                $idItem = $row['idItem'];

                $query2 = "SELECT * FROM items WHERE id='$idItem'";
                $resultado2 = $conexion_tabla->query($query2);
                $row2 = $resultado2->fetch_assoc();

				
				
       ?>
           
      <tr>
         <td class="col-md-1">
               <input type="hidden" id="valor-<?php echo $i ?>" name="idItem" value="<?php echo $row['posicion'] ?>">
            <form id="forma-historias-<?php echo $i ?>" onsubmit="posicionSubmit(<? echo $i ?>, <? echo $row['posicion'] ?>)" method="POST" action="procesando_modificacion_imagen.php">
               <input type="hidden" name="id_relacion" value="<?php echo $row['id'] ?>">
               <input type="hidden" name="id_historia" value="<?php echo $row['idHistoria'] ?>">
               <input id="img-<?php echo $i ?>" name="posicion" onfocusout="checarRepetidos(<?php echo $i ?>,<?php echo $row['posicion'] ?>)" type="number" value="<?php echo $row['posicion'] ?>">
            </form></td>
         <td class="col-md-2"> <?php echo $row2['coleccion']; ?></td>
         <td class="col-md-2" style=" width:120px; height:100px"> <img height="100px" width="120px" src="data:image/jpg;base64,<?php echo base64_encode($row2['img']);  ?>"/> <br /><br /></td>
         <td class="col-md-1"> <?php echo $row2['autor']; ?></td>
         <td class="col-md-1"> <?php echo $row2['serie']; ?></td>
         <td class="col-md-1"> <?php echo $row2['fecha']; ?></td>
         <td class="col-md-1"> <?php echo $row2['lugar']; ?></td>
         <td class="col-md-4"> <?php echo $row2['descripcion_img']; ?></td>
         <?php
            parse_str($_SERVER['QUERY_STRING'],$queryArray);
            $queryArray['id']=$row['id'];
            $queryArray['ref']=$_SERVER['PHP_SELF'];
            $queryString=http_build_query($queryArray);
         ?>
         <td class="col-md-1"> <a href="historias_eliminar_imagen.php?<?php echo $queryString ?>" class="btn btn-sm btn-red">Eliminar</a></td>
      </tr>
       
       <?php
		 $i = $i+1;
		 }// end while;
      ?>
       
       </tbody>
      </table>
      
      <div>
       <?php
		// seleccionar todo
		$query = "SELECT * FROM historias_items WHERE idHistoria='$id_historia'";
		$resultado = $conexion_tabla->query($query);
		//$resultado = mysqli_query($conexion_tabla, $query);
					
		//contar el total de registros
      $totalRegistros = mysqli_num_rows($resultado);
      $ref=$_SERVER['PHP_SELF'];
					
		//usando ciel para dividir el total de resgitros;					
      $totalPaginas = ceil($totalRegistros / $por_Pagina);

      echo "<ul class='carrusel'>";
      parse_str($_SERVER['QUERY_STRING'],$queryArray);
      $queryArray['pagina']=1;
      $queryString=http_build_query($queryArray);
      echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>Primera</a></li>";
   
      $por_carrusel=9;
      if($totalPaginas > $por_carrusel){
         for($i=1; $i<=$por_carrusel; $i++){

            if($pagina>ceil(($por_carrusel/2)+1) and $pagina<=($totalPaginas-floor($por_carrusel/2))){
               $empieza_carrusel = $pagina-ceil($por_carrusel/2);
               $numero_carrusel = $empieza_carrusel + $i;
            }
            elseif($pagina>=($totalPaginas-floor($por_carrusel/2))){
               $empieza_carrusel = $totalPaginas-$por_carrusel;
               $numero_carrusel = $empieza_carrusel + $i;
            }
            else{
               $numero_carrusel=$i;
            }

            parse_str($_SERVER['QUERY_STRING'],$queryArray);
            $queryArray['pagina']=$numero_carrusel;
            $queryString=http_build_query($queryArray);
            echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$numero_carrusel</a></li>";
         }
      }
      else{
         for($i=1; $i<=$totalPaginas; $i++){
            parse_str($_SERVER['QUERY_STRING'],$queryArray);
            $queryArray['pagina']=$i;
            $queryString=http_build_query($queryArray);
            echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$i</a></li>";
         }
      }

      // link a la ultima página
      parse_str($_SERVER['QUERY_STRING'],$queryArray);
      $queryArray['pagina']=$totalPaginas;
      $queryString=http_build_query($queryArray);
      echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>Última</a></li>";
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