<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/favoritosModel.php';
session_start();
$id = $_POST['id'];
$idUsuario = $_SESSION['idUsuario'];

$mensajes = new favoritosModel();
$datos = $mensajes->deleteFavoritos($id,$idUsuario);

header("Location: /../../DWES_PHP_PPV_2020/view/userView/favoritosView.php");

?>