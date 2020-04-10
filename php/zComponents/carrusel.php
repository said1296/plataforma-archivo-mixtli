<?php
    $totalPaginas = ceil($totalRegistros / $por_Pagina);
    if ($totalPaginas > 1) {
        $ref = $_SERVER['PHP_SELF'];

        echo "<ul class='carrusel mb-50'>";
        parse_str($_SERVER['QUERY_STRING'], $queryArray);
        $queryArray[$queryVar] = 1;
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
                $queryArray[$queryVar] = $numero_carrusel;
                $queryString = http_build_query($queryArray);
                echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$numero_carrusel</a></li>";
            }
        } else {
            for ($i = 1; $i <= $totalPaginas; $i++) {
                parse_str($_SERVER['QUERY_STRING'], $queryArray);
                $queryArray[$queryVar] = $i;
                $queryString = http_build_query($queryArray);
                echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>$i</a></li>";
            }
        }

        // link a la ultima página
        parse_str($_SERVER['QUERY_STRING'], $queryArray);
        $queryArray[$queryVar] = $totalPaginas;
        $queryString = http_build_query($queryArray);
        echo "<li class='btn btn-md btn-light'><a href='$ref?$queryString'>Última</a></li>";
        echo "</ul>";
    }
?>