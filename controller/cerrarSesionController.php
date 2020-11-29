<?php


function cerrarSesion(){
    if(!empty ($_SESSION['usuario'] )  ){
        session_destroy();
        header("Location: /DWES_PHP_PPV_2020/index.php");

    }
}

?>
