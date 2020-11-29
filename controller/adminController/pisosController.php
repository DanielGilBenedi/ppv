<?php

require_once $_SERVER['DOCUMENT_ROOT'].
    '/DWES_PHP_PPV_2020/model/pisosModel.php';
session_start();
$piso = new pisosModel();
$datos = $piso->getPisos();
$numMsg = $piso->paginacionPisos();

$_SESSION['datosPisos'] = $datos;
$_SESSION['numPisos'] = $numMsg;

header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/borrarPiso.php");


?>
