<?php
if(isset($_POST)) {
require_once $_SERVER['DOCUMENT_ROOT'].
    '/DWES_PHP_PPV_2020/model/usuariosModel.php';
$id = $_POST['id'];
$users = new usuariosModel();
$users->eliminarUsuario($id);
header("Location: /../../DWES_PHP_PPV_2020/controller/adminController/verUsuariosEliminar.php");
}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}

?>


