<?php
    $buttons=[];
    if($ref=='serie'){
        $buttons['Explorar']='/php/colecciones/serie.php?'.'idSerie='.$row['id'];
        if($_SESSION['tipo']==1 or $_SESSION['id']==$row['idUsuario']){
            $buttons['Modificar']='/php/upload/modificar_serie.php?idSerie='.$row['id'];
            $buttons['Eliminar']='/php/upload/actions/eliminar_serie.php?'.'idSerie='.$row['id'];
        }
    }
    elseif($ref=='historia'){
        $buttons['Leer']='/php/historias/ver_historia.php?idHistoria='.$row['id'];
        if($_SESSION['tipo']==1 or $_SESSION['id']==$row['idUsuario']){
            $buttons['Eliminar']='/php/historias/acciones/eliminar_historia.php?idHistoria='.$row['id'];
        }
    }elseif($ref=='historiaMedia'){
        $buttons['Detalles']='/php/colecciones/detalles.php?'.'id='.$row['id'];
        if($_SESSION['tipo']==1 or $_SESSION['id']==$row['idUsuario']){
            $buttons['Quitar']='/php/historias/acciones/eliminar_item_historia.php?idHistoria='.$row_historia['id'].'&idItem='.$row['id']."&idUsuario=".$row['idUsuario'];
        }
    }
    elseif($ref=='usuario'){
        $buttons['Colecciones']='/php/colecciones/series.php?idUsuario='.$row['id'];
        if($_SESSION['tipo']==1 or $_SESSION['id']==$row['idUsuario']){
            $buttons['Eliminar']='/php/comunidad/acciones/eliminar_colaborador.php?idUsuario='.$row['id'];
        }
    }
    else{
        $buttons['Detalles']='/php/colecciones/detalles.php?'.'id='.$row['id'];
        if($_SESSION['tipo']==1 or $_SESSION['id']==$row['idUsuario']){
            $buttons['Modificar']='/php/upload/modificar_item.php?id='.$row['id'];
            $buttons['Eliminar']='/php/upload/actions/eliminar_item.php?id='.$row['id'];
        }
    }

?>

<div class="col-md-3 col-sm-6 col-xs-12 work-item">
    <div class="work-container">
        <div class="work-img" style="min-height:100px; background-color: gray">
            <?php
            if ($tipo=='foto') {
                echo '<img src="/uploads/' . implode("/", $ids) . '.jpg" alt="">';
            } elseif ($tipo=="video") {
                $url = $row['link'];
                if (strpos($url, "youtube")) {
                    parse_str(parse_url($url, PHP_URL_QUERY), $url_vars);
                    $video_id = $url_vars['v'];
                    echo '<img src="http://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg" alt="">';
                } elseif (strpos($url, "archive")) {
                    $url = explode("/", $url);
                    echo '<img src="https://archive.org/services/img/' . end($url) . '" alt="">';
                }
            } else {
                if ($row['link']) {
                    $url = $row['link'];
                    if (strpos($url, "soundcloud")) {
                        echo '<img src="../../themes/img/misc/soundcloud.png" alt="">';
                    } else {
                        echo '<img src="../../themes/img/misc/audio_icon.jpg" alt="">';
                    }
                } else {
                    echo '<img src="../../themes/img/misc/audio_icon.jpg" alt="">';
                }
            }
            ?>
            <div class="work-overlay">
                <?php
                $colors=["red", "green", "blue"];
                $counter=0;
                foreach($buttons as $key=>$value){
                ?>
                    <a href="<?php echo $value; ?>" style='width:60%;' class="btn btn-lg btn-<?php echo $colors[$counter] ?>"><?php echo $key; ?></a>
                <?php
                    ++$counter;
                }

                ?>
            </div>
        </div>
        <div class="work-description">
            <h2><a href="<?php echo reset($buttons); ?>"><?php echo $descripcion; ?></a></h2>
        </div>
    </div>
</div>