<?php require_once $_SERVER['DOCUMENT_ROOT'].
    '/DWES_PHP_PPV_2020/model/mensajesModel.php';
session_start();
$id = $_SESSION['idUsuario'];
$msg = new mensajesModel();
$datos = $msg->mostrarMensajesPorUsuario($id);

$_SESSION['datosMensajes'] = $datos;

header("Location: /../../DWES_PHP_PPV_2020/view/userView/mensajeView.php");



?>
