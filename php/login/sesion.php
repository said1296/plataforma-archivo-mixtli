<?php
   session_start();

   if(!isset($_SESSION['u_usuario'])){
      header("Location: index.php");
   }

   include("../utils/conexion_tabla.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Subir series a tu colección | Preservación Digital Comunitaria</title>
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

      <section class="page-title style-2 text-center" style="background-image: url(../../themes/img/sections/login.jpg)">
         <div class="container relative clearfix">
            <div class="title-holder">
               <div class="title-text">
                  <h1 class="uppercase"><?php echo $_SESSION['u_usuario'] ?></h1>
               </div>
            </div>
         </div>
      </section>


      <section class="section-wrap" id="colections">
         <div class="container">

            <div class="row">
               <div class="col-sm-6">
                  <a href="../upload/añadir_serie.php" class="btn btn-md btn-black mb-20">Agregar nueva serie</a>
               </div>
            </div>
            <br />


            <div class="container">
               <div class="row">
                  <br />
                  <table class="table table-striped">
                     <tbody>

                        <thead>
                           <tr>
                              <th class="col-md-2">
                                 <h5 class="widget-title">Serie</h5>
                              </th>
                              <th class="col-md-2">
                                 <h5 class="widget-title">Imagen</h5>
                              </th>
                              <th class="col-md-1">
                                 <h5 class="widget-title">Grupo</h5>
                              </th>
                              <th class="col-md-3">
                                 <h5 class="widget-title">Descripción</h5>
                              </th>
                              <th colspan="2" class="col-md-2">
                                 <h5 class="widget-title">Operaciones</h5>
                              </th>
                           </tr>
                        </thead>

                        <?php
                        // cantidad de registros por pagina
                        $por_Pagina = 10;

                        if (isset($_GET['pagina'])) {
                           $pagina = $_GET['pagina'];
                        } else {
                           $pagina = 1;
                        }

                        //la página inicia en 0 y se multiplica $por_Pagina
                        $empieza = ($pagina - 1) * $por_Pagina;

                        //contar total de registros
                        $query = "SELECT COUNT(*) as total FROM series 
                                    LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
                                    WHERE usuarios_.id='$_SESSION[id]'";
                        $resultado = $conexion_tabla->query($query);
                        $data = $resultado->fetch_assoc();
                        $totalRegistros = $data['total'];

                        //seleccionar los registros de la tabla gestion_imagen con LIMIT
                        $query = "SELECT series.* FROM series 
                                    LEFT JOIN usuarios_ ON series.idUsuario=usuarios_.id
                                    WHERE usuarios_.id='$_SESSION[id]' LIMIT $empieza, $por_Pagina ";

                        //$resultado = mysqli_query($conexion_tabla, $query);
                        //$query = "SELECT * FROM gestion_imagen";
                        $resultado = $conexion_tabla->query($query);
                        while ($row = $resultado->fetch_assoc()) {
                           $idSerie=$row['id'];
                        ?>

                           <tr>
                              <td class="col-md-2"> <?php echo $row['serie']; ?></td>
                              <td class="col-md-2" style=" width:120px; height:100px"> <img height="100px" width="120px" src="../../uploads/<?php echo implode("/", [$_SESSION['id'], $idSerie, 0]) ?>.jpg" /> <br /><br /></td>
                              <td class="col-md-1"> <?php echo $row['grupo']; ?></td>
                              <td class="col-md-3"> <?php echo $row['descripcion_serie']; ?></td>
                              <td class="col-md-1"> <a href="../upload/añadir_item.php?idSerie=<?php echo $row['id']; ?>" class="btn btn-sm btn-dark">Añadir a serie</a> </td>
                              <td class="col-md-1"> <a href="../colecciones/serie.php?idSerie=<?php echo $row['id']; ?>" class="btn btn-sm btn-red">Ver serie</a></td>
                           </tr>

                        <?php
                        } // end while;
                        ?>

                     </tbody>
                  </table>

                  <div>
                     <?php
                     $totalPaginas = ceil($totalRegistros / $por_Pagina);

                     if ($totalPaginas > 1) {
                        $ref = $_SERVER['PHP_SELF'];

                        echo "<ul class='carrusel'>";
                        parse_str($_SERVER['QUERY_STRING'], $queryArray);
                        $queryArray['pagina'] = 1;
                        $queryString = http_build_query($queryArray);
                        echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>Primera</a></li>";

                        $por_carrusel = 9;
                        if ($totalPaginas > $por_carrusel) {
                           for ($i = 1; $i <= $por_carrusel; $i++) {

                              if ($pagina > ceil(($por_carrusel / 2) + 1) and $pagina <= ($totalPaginas - floor($por_carrusel / 2))) {
                                 $empieza_carrusel = $pagina - ceil($por_carrusel / 2);
                                 $numero_carrusel = $empieza_carrusel + $i;
                              } elseif ($pagina >= ($totalPaginas - floor($por_carrusel / 2))) {
                                 $empieza_carrusel = $totalPaginas - $por_carrusel;
                                 $numero_carrusel = $empieza_carrusel + $i;
                              } else {
                                 $numero_carrusel = $i;
                              }

                              parse_str($_SERVER['QUERY_STRING'], $queryArray);
                              $queryArray['pagina'] = $numero_carrusel;
                              $queryString = http_build_query($queryArray);
                              echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$numero_carrusel</a></li>";
                           }
                        } else {
                           for ($i = 1; $i <= $totalPaginas; $i++) {
                              parse_str($_SERVER['QUERY_STRING'], $queryArray);
                              $queryArray['pagina'] = $i;
                              $queryString = http_build_query($queryArray);
                              echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$i</a></li>";
                           }
                        }

                        // link a la ultima página
                        parse_str($_SERVER['QUERY_STRING'], $queryArray);
                        $queryArray['pagina'] = $totalPaginas;
                        $queryString = http_build_query($queryArray);
                        echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>Última</a></li>";
                        echo "</ul>";
                     }
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