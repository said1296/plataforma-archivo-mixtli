<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <?php
	    
		$consulta = $_GET['consulta'];
		$consulta_encoded = urlencode($consulta);
		$consulta_array = explode(" ", $consulta);
		
  ?>
  
  
  <title>Búsqueda | Preservación Digital Comunitaria para la persistencia de nuestra imagen</title>
   <?php
      include("../includes/head.php");
   ?>
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
	   <h1 class="uppercase"><?php echo $consulta ?></h1>
	   <ol class="breadcrumb">
		<li>Búsqueda</li>
	   </ol>
	  </div>
	 </div>
	</div>
   </section>
   
   <section class="section-wrap">
    
<div class="container">
		<div class="col-md-3" style="margin-left:20px;">
			<div class="nav-search type-2">
                <form action="historias_buscar.php?asdf<?php echo $_SERVER['QUERY_STRING'] ?>" method="get">
                        <?php
                            parse_str($_SERVER['QUERY_STRING'],$queryArray);
                            foreach($queryArray as $key=>$value){
                                echo "<input type='hidden' name='$key' value='$value'>";
                            }
                            ?>
                        <input type="search" id="search-bar" name="consulta" placeholder="Buscar en toda la base">
                        <button type="submit" class="search-button">
                        <i class="icon icon_search"></i>
                </button>
                </form>
			</div>
		</div>
	<div class="col-sm-12 mt-20">
     <h2 class="heading relative heading-small upperacase bottom-line style-2 left-align mb-0">Series</h2><br /><br /> 
	 		<div class="row mb-20 recent-posts">
	  		<div id="portfolio-container" class="works-grid small-gutter with-title">
      
        		<?php
					$consulta = $_REQUEST['consulta'];
					if($_GET['pagina']){
						$pagina = $_GET['pagina'];
					}else{
					   $pagina = 1;
					}
		 
		 
					include("conexion_tabla.php");
					if($_GET["avanzada_autor"])
					{
						$columns_query[]="autor";
					}
					if($_GET["avanzada_serie"]){
						$columns_query[]="serie";
					}
					if($_GET["avanzada_seriedescripcion"]){
						$columns_query[]="descripcion_serie";
					}
					if(empty($columns_query)){
						$columns_query=['serie', 'autor', 'descripcion_serie'];
					}
					$counter=0;
					foreach($columns_query as $columns){
						$counter_palabra=0;
						foreach($consulta_array as $palabra){
							if($counter_palabra>0){
								$queries_palabras[$counter]=$queries_palabras[$counter]." AND ".$columns_query[$counter]." LIKE '%$palabra%'";
								$counter_palabra=$counter_palabra+1;
							}
							else{
								$queries_palabras[$counter]="("."$columns_query[$counter] LIKE '%$palabra%'";
								$counter_palabra=$counter_palabra+1;
							}
						}
						$queries_palabras[$counter]=$queries_palabras[$counter].")";
						$counter=$counter+1;
					}

					$query = "SELECT COUNT(*) as total FROM series WHERE ".implode(' OR ',$queries_palabras);
					$resultado = $conexion_tabla->query($query);
					$data = $resultado->fetch_assoc();
					$totalRegistros=$data['total'];

					if(isset($_GET['paginaSeries'])){
						$paginaSeries = $_GET['paginaSeries'];
					}else{
						$paginaSeries = 1;
					}

					$por_Pagina = 8;
					$empieza = ($paginaSeries-1) * $por_Pagina;
					$query = "SELECT * FROM series WHERE ".implode(' OR ',$queries_palabras)." LIMIT $empieza, $por_Pagina";
					$resultado = $conexion_tabla->query($query);
					
					
					if($resultado->num_rows > 0 ){
							
						while($row = $resultado->fetch_assoc()){
							$serie=$row['serie'];
					
				?>
	   
      

					<div class="col-md-3 col-sm-6 col-xs-12 work-item">
						<div class="work-container">
							<div class="work-img">
		  						<img style="min-height:150px" src='data:image/jpg;base64,<?php echo base64_encode($row['imgSerie']);  ?> ' alt="">
								<div class="work-overlay">
									<a href="historias_imagenes_items.php?<?php 
                                        parse_str($_SERVER['QUERY_STRING'],$queryArray);
                                        $queryArray['serie']=$row['serie'];
                                        $queryArray['ref']=$_SERVER['PHP_SELF'];
                                        $queryString=http_build_query($queryArray);
                                        echo $queryString;
                                        ?>" class="btn btn-lg btn-red">Explorar</a>
                                </div>
		 					</div>
         					<div class="work-description">
		   						<h2><a href="serie.php?serie=<?php echo $row['serie']; ?>&consulta=<?php echo urlencode($_GET['consulta']); ?>"><?php echo $row['serie']; ?></a></h2>
							</div>
						</div> 
	  				</div>
       
					<?php
							//end WHILE
							}

						}else{
							echo "<div class='col-md-3 col-sm-6 col-xs-12 work-item'>No hay series con " .$consulta. ". </div><br><br><br>";
						}		
					?>
       
    		</div>
    	</div>

		<?php
			$totalPaginas = ceil($totalRegistros / $por_Pagina);
			if($totalPaginas>1){
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
			}
      ?>

		<h2 class="heading relative heading-small upperacase bottom-line style-2 left-align mb-0">Fotos</h2><br /><br /> 
    	<div class="row recent-posts">
	  		<div id="portfolio-container" class="works-grid small-gutter with-title">
      
        		<?php
					$consulta = $_REQUEST['consulta'];
					$columns_query = [];
		 
					include("conexion_tabla.php");
					if($_GET["avanzada_autor"])
					{
						$columns_query[]="autor";
					}
					if($_GET["avanzada_serie"]){
						$columns_query[]="serie";
					}
					if($_GET["avanzada_seriedescripcion"]){
						$columns_query[]="descripcion_img";
					}
					if(empty($columns_query)){
						$columns_query=['lugar', 'autor', 'descripcion_img', 'descriptores'];
					}

					$counter=0;
					foreach($columns_query as $columns){
						$counter_palabra=0;
						foreach($consulta_array as $palabra){
							if($counter_palabra>0){
								$queries_palabras[$counter]=$queries_palabras[$counter]." AND ".$columns_query[$counter]." LIKE '%$palabra%'";
								$counter_palabra=$counter_palabra+1;
							}
							else{
								$queries_palabras[$counter]="("."$columns_query[$counter] LIKE '%$palabra%'";
								$counter_palabra=$counter_palabra+1;
							}
						}
						$queries_palabras[$counter]=$queries_palabras[$counter].")";
						$counter=$counter+1;
					}

					$por_Pagina = 12;

					$empieza = ($pagina-1) * $por_Pagina;

					//Contar total de resultados para dividir en páginas
					$query = "SELECT * FROM colecciones WHERE ".implode(' OR ',$queries_palabras);
					$resultado = $conexion_tabla->query($query);
					$totalRegistros = mysqli_num_rows($resultado);

					//Seleccionar registros a buscar en la página actual
					$query = "SELECT colecciones.*,
									MATCH (descripcion_img) AGAINST ('$consulta' IN BOOLEAN MODE) AS descripcion_match,
									MATCH (lugar) AGAINST ('$consulta' IN BOOLEAN MODE) AS lugar_match,
									MATCH (descriptores) AGAINST ('$consulta' IN BOOLEAN MODE) AS descriptores_match,
									MATCH (autor) AGAINST ('$consulta' IN BOOLEAN MODE) AS autor_match
									FROM colecciones
									WHERE MATCH(".implode(',',$columns_query).") AGAINST ('$consulta' IN BOOLEAN MODE)
									ORDER BY (descripcion_match * 4 + lugar_match * 2 + descriptores_match * 1 + autor_match * 0.5) DESC
									LIMIT $empieza, $por_Pagina";
					$resultado = $conexion_tabla->query($query);
				
					
					if($resultado->num_rows > 0 ){
							
						while($row = $resultado->fetch_assoc()){
							if($row['tipo']=='foto'){				
				?>
	   
      
				<div class="col-md-3 col-sm-6 col-xs-12 work-item">
					<div class="work-container">
						<div class="work-img">
							<?php
								if($row['tipo']=="foto"){
									echo '<img  style="min-height:150px;" src="data:image/jpg;base64,'.base64_encode($row['img']).'" alt="">';
								}elseif($row['tipo']=="video"){
									$url=$row['link'];
									if(strpos($url,"youtube")){
										parse_str( parse_url( $url, PHP_URL_QUERY ), $url_vars );
										$video_id = $url_vars['v'];
										echo '<img src="http://img.youtube.com/vi/'.$video_id.'/hqdefault.jpg" alt="">';
									}elseif(strpos($url,"archive")){
										$url=explode("/",$url);
										echo '<img src="https://archive.org/services/img/'.end($url).'" alt="">';
									}
								}else{
									if($row['link']){
										$url=$row['link'];
										if(strpos($url,"soundcloud")){
										echo '<img src="../../themes/img/misc/soundcloud.png" alt="">';
										}else{
                      echo '<img src="../../themes/img/misc/audio_icon.jpg" alt="">';
										}
									}else{
										echo '<img src="../../themes/img/misc/audio_icon.jpg" alt="">';
									}
								}
							?>
								<div class="work-overlay">
                                    <a style="width:180px;" href="<?php
                                        parse_str($_SERVER['QUERY_STRING'],$queryArray);
                                        $queryArray['id']=$row['id'];
                                        $queryArray['ref_prev']=$queryArray['ref'];
                                        $queryArray['ref']=$_SERVER['PHP_SELF'];
                                        $queryString=http_build_query($queryArray);
                                        echo "historias_detalles.php?".$queryString;
                                        ?>" class="btn btn-lg btn-black">Detalles</a>
                                    <a style="width:180px;" href="<?php
                                        parse_str($_SERVER['QUERY_STRING'],$queryArray);
                                        $queryArray['id_colecciones']=$row['id'];
                                        $queryString=http_build_query($queryArray);
                                        echo "historias_imagenes_guardar.php?".$queryString;
                                        ?>" class="btn btn-lg btn-red">Agregar</a>
                                </div>
						</div>
						<div class="work-description">
							<h2><a href="detalles.php?consulta=<?php echo urlencode($_GET['consulta']); ?>&id=<?php echo $row['id'] ?>"><?php echo $row['descripcion_img']; ?></a></h2>
						</div>
					</div> 
				</div>
							
					
				<?php
						} //END IF
					//end WHILE
					}

					}else{
						echo "No hay fotos con " .$consulta. ". <br><br><br>";
					}		
				?>
       
			</div>		
		</div>
	 
		<?php
			$totalPaginas = ceil($totalRegistros / $por_Pagina);

			if($totalPaginas>1){
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
			}
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