<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/favoritosModel.php';
session_start();
//if(isset($_SESSION)){
$user = new favoritosModel();
$numFavoritos = $user->paginacionFavoritos();
$_SESSION['numFavoritos'] = $numFavoritos;

header("Location: /../../DWES_PHP_PPV_2020/view/userView/favoritosView.php");
?>