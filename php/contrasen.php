<?php
$contraseñas = ["20194ng3l", "lirio", "Fussibl0", "Xochimilc@", "elorigen", "janisjoplin.1"];

foreach($contraseñas as $contraseña){
    echo $contraseña."\n";
    echo password_hash($contraseña, PASSWORD_DEFAULT)."              \n\n";
}