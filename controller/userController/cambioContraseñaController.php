<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/usuariosModel.php';
session_start();

$contrasenaNueva = $_POST['contrasenaNueva'];
$contrasenaRepetir = $_POST['contrasenaRepetir'];
$id = $_SESSION['idUsuario'];
var_dump($id);
$user = new usuariosModel();
$user->cambiarConstrasena($id,$contrasenaNueva);

if($user->cambiarConstrasena($id,$contrasenaNueva)){
    header("Location: /../../DWES_PHP_PPV_2020/view/userView/userView.php");
}

?>

