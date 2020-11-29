<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/usuariosModel.php';
session_start();

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$usuario = $_POST['usuario'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$id = $_SESSION['idUsuario'];

$user = new usuariosModel();
$user->cambiarDatosUsuario($id,$nombre,$apellidos,$edad,$telefono,$usuario,$email);



if($user->cambiarDatosUsuario($id,$nombre,$apellidos,$edad,$telefono,$usuario,$email)){

    $datos = $user->getUsers();

    $_SESSION['datos'] = $datos;
    //var_dump($_SESSION['datos']);
    header("Location: /../../DWES_PHP_PPV_2020/view/userView/modificarView.php");
}



?>


