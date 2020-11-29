<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'].
    '/DWES_PHP_PPV_2020/model/usuariosModel.php';

$users = new usuariosModel();
$datos = $users->getUsers();

$_SESSION['datos'] = $datos;

header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/adminView.php");

?>



