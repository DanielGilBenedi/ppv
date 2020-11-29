
<?php
if(isset($_SESSION)) {
require_once $_SERVER['DOCUMENT_ROOT'].
    '/DWES_PHP_PPV_2020/model/usuariosModel.php';
session_start();
$users = new usuariosModel();
$datos = $users->getUsers();

$_SESSION['datos'] = $datos;

header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/userRemove.php");
}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}

?>
