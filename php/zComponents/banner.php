<section class="page-title style-2 text-center" style="
    <?php
        if ($tipo == 'foto') {
            echo "color: #fff; background-image: url(../../uploads/".implode("/", $ids).".jpg)";
        } elseif ($tipo == 'video') {
            $url = $row['link'];
            if (strpos($url, "youtube")) {
                parse_str(parse_url($url, PHP_URL_QUERY), $url_vars);
                $video_id = $url_vars['v'];
                $url_background = "http://img.youtube.com/vi/" . $video_id . '/hqdefault.jpg';
                echo 'color: #fff; background-image: url('.$url_background . ")";
            } elseif (strpos($url, "archive")) {
                $url = explode("/", $url);
                $url_background = "https://archive.org/services/img/" . end($url);
                echo 'color:#fff; background-image: url('.$url_background . ")";
            }
        } else {
            echo 'background-color: #f5f5f5; color: black;';
        }
    ?>">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1 style='margin:0px; color:inherit' class="uppercase"><?php echo $titleBig ?></h1>
                <p style='font-size: 12px; margin:0px; color:inherit'><?php echo $titleSmall ?></p>
            </div>
        </div>
    </div>
</section>