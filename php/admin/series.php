<?php
  session_start();
  
	include("conexion_usuario.php");
	include("conexion_tabla.php");
  
  if(isset($_SESSION['u_usuario'])){
     $usuario = $_SESSION['u_usuario'];
     $proceso = $conexionUsuario->query(" SELECT * FROM usuariosadmin_ WHERE usuario='$usuario'");
     $resultado = mysqli_fetch_array($proceso);
	
		if($resultado){
			$_SESSION['u_usuario'] = $usuario;
			$usuario = null;

    		if (count($resultado) > 0) {
               $usuario = $resultado;
    		}
      }else{
         header ("Location: index.php");
      }
   }else{
      header ("Location: index.php");
   }
				   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Series | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
   <?php
      include("../includes/head.php");
   ?>
	
  <link rel="stylesheet" href="../../themes/css/misc.css" />
 </head>
  
 <body data-spy="scroll" data-offset="60" data-target=".navbar-fixed-top" style="font-family: Hind, sans-serif" class="onepage">
  
  <div class="loader-mask">
   <div class="loader">
    "Cargando..."
   </div>
  </div>
  
<?php
   include('../includes/header.php')
?>
  
  <!--- WRAPP --->
  <div class="main-wrapper oh">
  
  <section class="page-title style-2 text-center">
    <div class="container relative clearfix">
      <div class="title-holder">
        <div class="title-text">
          <h1 class="uppercase">Series</h1>
          <ol class="breadcrumb">
            <li> Bienvenido <?php echo "&nbsp;" . $_SESSION['u_usuario']; ?> </li>
          </ol>
        </div>
      </div>
    </div>
  </section>
   
   <section class="section-wrap">
    
    <div class="container">
	 <div class="row">
      
      <div class="col-sm-6">
	   <div class="about-description">
	    <p></p>
	   </div>
	  </div>
      
     </div>
	</div>
    
	
    <div class="container">
			<div class="col-md-3" style="margin-left:20px;">
				<div class="nav-search type-2">
					<form action="series_buscar.php" method="get">
							<input type="search" id="search-bar" name="consulta" placeholder="Buscar en toda la base">
							<button type="submit" class="search-button">
							<i class="icon icon_search"></i>
					</button>
					</form>
				</div>
			</div>
		<div class="col-sm-12 mt-20">
			<h2 class="heading relative heading-small upperacase bottom-line style-2 left-align mb-0">Series</h2><br /><br /> 
		</div>
		<div class="row recent-posts">

	  	<div id="portfolio-container" class="works-grid small-gutter with-title">
      
        <?php

          $por_Pagina = 20;

					if(isset($_GET['pagina'])){
						$pagina = $_GET['pagina'];
					}else{
					   $pagina = 1;
					}

					$empieza = ($pagina-1) * $por_Pagina;

					//Contar total de resultados para dividir en páginas
					$query = "SELECT * FROM series";
					$resultado = $conexion_tabla->query($query);
					$totalRegistros = mysqli_num_rows($resultado);

					//Seleccionar registros a buscar en la página actual
					$query = "SELECT * FROM series LIMIT $empieza, $por_Pagina";
					$resultado = $conexion_tabla->query($query);
					
					
					if($resultado->num_rows > 0 ){
							
						while($row = $resultado->fetch_assoc()){ 				
				?>
	   
      
				<div class="col-md-3 col-sm-6 col-xs-12 work-item">
					<div class="work-container">
						<div class="work-img">
							<?php
									echo '<img src="data:image/jpg;base64,'.base64_encode($row['imgSerie']).'" alt="">';
							?>
								<div class="work-overlay">
									<a style="width:180px;" href="<?php
										parse_str($_SERVER['QUERY_STRING'],$queryArray);
										$queryArray['id']=$row['id'];
										$queryArray['ref']=$_SERVER['PHP_SELF'];
										$queryString=http_build_query($queryArray);
										echo "series_eliminar_serie.php?".$queryString;
										?>" class="btn btn-lg btn-red">Eliminar</a>
									<a style="width:180px;" href="series_imagenes.php?serie=<?php echo $row['serie'];?>&pagina_series=<?php echo $pagina ?>" class="btn btn-lg btn-green mt-5">Ver serie</a>
									<a style="width:180px;" href="series_modificar_serie.php?<?php
										parse_str($_SERVER['QUERY_STRING'], $queryArray);
										$queryArray['ref']=$_SERVER['PHP_SELF'];
										$queryArray['serie']=$row['serie'];
										$queryString=http_build_query($queryArray);
										echo $queryString;
										?>" class="btn btn-lg btn-blue">Modificar</a>
								</div>
						</div>
						<div class="work-description">
							<h2><a href="detalles.php?id=<?php echo $row['id'] ?>"><?php echo $row['serie']; ?></a></h2>
						</div>
					</div> 
				</div>


					
				<?php
					//end WHILE
					}

					}else{
            echo "No hay series registradas.";
					}		
				?>
       
			</div>		

		</div>
	 
		<?php
			$totalPaginas = ceil($totalRegistros / $por_Pagina);
			$ref=$_SERVER['PHP_SELF'];

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