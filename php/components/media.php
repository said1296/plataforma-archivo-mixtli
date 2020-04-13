<?php
if ($row["tipo"] == "foto" or $ref='serie') {
?>
    <div class="col-sm-6">
        <article>
            <div class="entry-img hover-scale">
                <a href="#" class="entry-category-label green">Mixtli</a>
                <a class="lightbox-gallery" title="<?php echo $row['descripcion_img']; ?>" href="data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?>">
                    <img src='../../uploads/<?php echo implode("/", $ids)  ?>.jpg' />
                </a>
            </div>
        </article>
    <?php
} else if ($row["tipo"] == "video") {
    ?>
        <div class="col-sm-6">
            <a href="#" class="entry-category-label green">Mixtli</a>
            <iframe class="embed-responsive-item" width=555vw height=350vh src="<?php
                                                                                $url = $row['link'];
                                                                                $finalUrl = '';
                                                                                if (strpos($url, 'facebook.com/') !== false) {
                                                                                    //it is FB video
                                                                                    $finalUrl .= 'https://www.facebook.com/plugins/video.php?href=' . rawurlencode($url) . '&show_text=1&width=200';
                                                                                } else if (strpos($url, 'vimeo.com/') !== false) {
                                                                                    //it is Vimeo video
                                                                                    $videoId = explode("vimeo.com/", $url)[1];
                                                                                    if (strpos($videoId, '&') !== false) {
                                                                                        $videoId = explode("&", $videoId)[0];
                                                                                    }
                                                                                    $finalUrl .= 'https://player.vimeo.com/video/' . $videoId;
                                                                                } else if (strpos($url, 'youtube.com/') !== false) {
                                                                                    //it is Youtube video
                                                                                    $videoId = explode("v=", $url)[1];
                                                                                    if (strpos($videoId, '&') !== false) {
                                                                                        $videoId = explode("&", $videoId)[0];
                                                                                    }
                                                                                    $finalUrl .= 'https://www.youtube.com/embed/' . $videoId;
                                                                                } else if (strpos($url, 'youtu.be/') !== false) {
                                                                                    //it is Youtube video
                                                                                    $videoId = explode("youtu.be/", $url)[1];
                                                                                    if (strpos($videoId, '&') !== false) {
                                                                                        $videoId = explode("&", $videoId)[0];
                                                                                    }
                                                                                    $finalUrl .= 'https://www.youtube.com/embed/' . $videoId;
                                                                                } else if (strpos($url, 'archive.org/') !== false) {
                                                                                    //it is Youtube video
                                                                                    $videoId = end(explode("/", $url));
                                                                                    if (strpos($videoId, '&') !== false) {
                                                                                        $videoId = explode("&", $videoId)[0];
                                                                                    }
                                                                                    $finalUrl .= 'https://www.archive.org/embed/' . $videoId;
                                                                                } else {
                                                                                    echo "Video inválido";
                                                                                }
                                                                                echo $finalUrl;
                                                                                ?>" allowfullscreen></iframe>
        <?php
    } else if ($row["tipo"] == "audio") {
        ?>
            <div class="col-sm-6">
                <article>
                    <div class="entry-img hover-scale">
                        <a href="#" class="entry-category-label green">Mixtli</a>
                        <a class="lightbox-gallery" title="<?php echo $row['descripcion_img']; ?>" href="data:image/jpg;base64,<?php echo base64_encode($row['img']);  ?>">
                            <?php
                            if ($row['link']) {
                                $url = $row['link'];
                                if (strpos($url, "soundcloud.com/")) {
                                    $url = explode("soundcloud.com", $url)[1];
                                    $url_final = "https://w.soundcloud.com/player/?url=https%3A//soundcloud.com" . $url . "&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true";
                                    echo "<iframe class='embed-responsive-item' width=555vw height=350vh src='" . $url_final . "' allow fullscreen></iframe>";
                                } elseif (strpos($url, "archive.org/")) {
                                    $url = end(explode("/", $url));
                                    $url_final = "https://archive.org/embed/" . $url;
                                    echo "<div style='top:200px; position:relative;'> <iframe class='embed-responsive-item' width=555vw height=350vh src='" . $url_final . "' allow fullscreen></iframe> </div>";
                                }
                            } else {
                                echo '<audio controls> <source src="data:audio/mpeg;base64,' . base64_encode($row['img']) . '"> </audio>';
                            }
                            ?>
                        </a>
                    </div>
                </article>
            <?php
        }
            ?>