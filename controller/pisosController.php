<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/pisosModel.php';

$pisos = new pisosModel();
$datos = $pisos->getPisos();

$_SESSION['pisos'] = $datos;

?>
