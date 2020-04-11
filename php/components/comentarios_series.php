<div class="container">
   <div class="row">
      <div class="col-lg-4 col-md-6">
         &nbsp;
      </div>
      <div class="col-lg-4 col-md-6">
         <h3>Comentarios</h3>
         <form class="relative" onsubmit="postComentario(event)" method="POST">
            <input type="hidden" REQUIRED id='ItemID' value=<?php echo $_GET['id'] ?>> <br /><br />
            <label for="input-label" class="text-left">Nombre</label>
            <input type="text" REQUIRED id="Usuario" placeholder="Ingrese su nombre de nombre..." /><br /><br />
            <label for="input-label">Comentario</label>
            <input type="text" REQUIRED id="Comentario" placeholder="Ingrese su comentario..." /><br /><br />
            <input type="submit" name="submit" value="Comentar" class="btn btn-lg btn-red" /><br />
         </form>
      </div>
      <div class="col-lg-4 col-md-6">
         &nbsp;
      </div>

      <div class="row bootstrap snippets">
         <div class="col-md-6 col-md-offset-3 col-sm-12">
            <div class="panel-body">
               <div class="clearfix"></div>
               <hr>
               <ul class="media-list">
                  <?php
                  $SerieID=$_GET['idSerie'];
                  $query = "SELECT * FROM comentarios_series WHERE SerieID='$SerieID'";
                  $resultado = $conexion_tabla->query($query);

                  while ($row = $resultado->fetch_assoc()) {
                  ?>
                     <li class="media">
<!--
<a href="#" class="pull-left">
<img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
</a>
-->
                        <div class="media-body">
                           <span class="text-muted pull-right">
                              <small class="text-muted"><?php echo $row['ComentarioFecha'] ?> &nbsp &nbsp </small>
                              <!-- <?php
                              if ($_SESSION['tipo'] == 1) {
                              ?>
                                 <form onsubmit='borrarComentario(event)' method='POST' style='display:inline-block'>
                                    <input type='hidden' name='ComentarioID' value=<?php echo $row['ComentarioID'] ?>>
                                    <button type='submit' class="btn btn-lg btn-red">X</button>
                                 </form>
                              <?php
                              }
                              ?> -->
                           </span>
                           <strong class="text-success"><?php echo $row['Usuario'] ?></strong>
                           <p>
                              <?php echo $row['Comentario'] ?>
                           </p>
                        </div>
                     </li>
                  <?php
                  } //END WHILE
                  ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
</div>

<script>
   function postComentario(e){
      e.preventDefault();
      $.ajax({
         url: '../components_actions/crear_comentario_serie.php',
         type: 'POST',
         data: {
            ItemID: e.target[0].value,
            Usuario: e.target[1].value,
            Comentario: e.target[2].value
         },
         success: function(msg) {
            window.location.replace(window.location.href);
         }               
      });
   }

   function borrarComentario(e){
      e.preventDefault();
      $.ajax({
         url: '../components_actions/eliminar_comentario_serie.php',
         type: 'POST',
         data: {
            ComentarioID: e.target[0].value
         },
         success: function(msg) {
            console.log(msg);
            window.location.replace(window.location.href);
         }               
      });
   }
</script>