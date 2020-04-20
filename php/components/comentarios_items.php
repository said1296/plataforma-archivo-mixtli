<?php
$id = $_GET['id'];
?>
<div class="container">
   <div class="row">
      <div class="col-lg-4 col-md-6">
         &nbsp;
      </div>
      <div class="col-lg-4 col-md-6">
         <h3>Comentarios</h3>
         <form class="relative" onsubmit="postComentario(event)" method="POST">
            <input type="hidden" REQUIRED id='idItem' value=<?php echo $id ?>> <br /><br />
            <label for="input-label" class="text-left">Nombre</label>
            <input type="text" REQUIRED id="usuario" placeholder="Ingrese su nombre..." /><br /><br />
            <label for="input-label">Comentario</label>
            <input type="text" REQUIRED id="comentario" placeholder="Ingrese su comentario..." /><br /><br />
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
                  $query = "SELECT * FROM comentarios_items WHERE idItem='$id'";
                  $resultado = $conexion_tabla->query($query);

                  while ($row = $resultado->fetch_assoc()) {
                  ?>
                     <li class="media">
                        <div class="media-body">
                           <span class="text-muted pull-right">
                              <small class="text-muted"><?php echo $row['fecha'] ?> &nbsp &nbsp </small>
                              <?php
                              if ($_SESSION['tipo'] == 1) {
                              ?>
                                 <form onsubmit='borrarComentario(event)' method='POST' style='display:inline-block'>
                                    <input type='hidden' name='id' value=<?php echo $row['id'] ?>>
                                    <button type='submit' class="btn btn-lg btn-red">X</button>
                                 </form>
                              <?php
                              }
                              ?>
                           </span>
                           <strong class="text-success"><?php echo $row['usuario'] ?></strong>
                           <p>
                              <?php echo $row['comentario'] ?>
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
   function postComentario(e) {
      e.preventDefault();
      $.ajax({
         url: '/php/componentes_acciones/crear_comentario_item.php',
         type: 'POST',
         data: {
            idItem: e.target[0].value,
            usuario: e.target[1].value,
            comentario: e.target[2].value
         },
         success: function(msg) {
            window.location.replace(window.location.href);
         }
      });
   }

   function borrarComentario(e) {
      e.preventDefault();
      $.ajax({
         url: '/php/componentes_acciones/eliminar_comentario_item.php',
         type: 'POST',
         data: {
            idComentario: e.target[0].value
         },
         success: function(msg) {
            console.log(msg);
            window.location.replace(window.location.href);
         }
      });
   }
</script>