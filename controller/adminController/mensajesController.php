<?php

require_once $_SERVER['DOCUMENT_ROOT'].
    '/DWES_PHP_PPV_2020/model/mensajesModel.php';
    session_start();
    $msg = new mensajesModel();
    $datos = $msg->mostrarMensajes();
    $numMsg = $msg->paginacionMensajes();

    $_SESSION['datosMensajes'] = $datos;
    $_SESSION['numMensajes'] = $numMsg;

header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/mensajeView.php");


?>
