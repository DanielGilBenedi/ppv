<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/mensajesModel.php';

$mensaje = $_POST['mensaje'];
$idUsuario = intval($_SESSION['idUsuario']);
$idPiso = intval($_POST['idPiso']);
$conMensajes = new mensajesModel();
$conMensajes ->subirMensaje($mensaje,$idUsuario, $idPiso);

    header("Location: /../../DWES_PHP_PPV_2020/view/pisosVista.php");


?>