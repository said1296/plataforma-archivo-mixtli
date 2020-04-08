<div class="container">
   <div class="row">       
      <div class="col-lg-4 col-md-6">
         &nbsp;
      </div>
      <div class="col-lg-4 col-md-6">
         <h3>Comentarios</h3>
         <form class="relative" action=""  method="POST">
            <input type="hidden" REQUIRED name="serie" value="<?php $serie=$_GET['serie']; echo $serie; ?>" placeholder="Nombre de serie..." /><br /><br />
            <label for="input-label" class="text-left">Nombre</label>
            <input type="text" REQUIRED name="usuario" placeholder="Ingrese su nombre de nombre..." /><br /><br />
            <label for="input-label">Comentario</label>
            <input type="text" REQUIRED name="comentario" placeholder="Ingrese su comentario..." /><br /><br />
            <input type="submit" name="submit" value="Comentar" class="btn btn-lg btn-red" /><br />
         </form>
      </div>
      <div class="col-lg-4 col-md-6">
         &nbsp;
      </div>

      <?php
         $ItemID = $_GET['id'];
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['submit'])){
               $Usuario = $_POST['usuario'];
               $Comentario = $_POST['comentario'];
            
               $query = "INSERT INTO comentarios_items (ItemID,Usuario,Comentario) VALUES('$ItemID','$Usuario','$Comentario')";
               $resultado = $conexion_tabla->query($query);
         
            }
         
         }
      ?>
<div class="row bootstrap snippets">
    <div class="col-md-6 col-md-offset-3 col-sm-12">
                <div class="panel-body">
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list">
                     <?php
                     $query = "SELECT * FROM comentarios_items WHERE ItemID='$ItemID'";
                     $resultado = $conexion_tabla->query($query);
                           
                     while($row = $resultado->fetch_assoc()){
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
                                    <?php
                                       if($admin==1){
                                    ?>
                                    <a href="series_eliminar_comentario_item.php?ComentarioID=<?php echo $row['ComentarioID']."&".$_SERVER["QUERY_STRING"] ?>" class="btn btn-lg btn-red">X</a>
                                    <?php
                                       }
                                    ?>
                                </span>
                                <strong class="text-success"><?php echo $row['Usuario'] ?></strong>
                                <p>
                                    <?php echo $row['Comentario'] ?>
                                </p>
                            </div>
                        </li>
                     <?php
                     }//END WHILE
                     ?>
                    </ul>
                </div>
    </div>
</div>
      
     
      

      
       
      </div>
   </div>
</div>