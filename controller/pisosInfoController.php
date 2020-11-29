<?php

if(isset($_GET['id'])){
    require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/pisosModel.php';
    session_start();
    $idPiso = $_GET['id'];

    $pisos = new pisosModel();
    $datos = $pisos->getPisosId($idPiso);

    $_SESSION['pisoInfo'] = $datos;

    header("Location: /../../DWES_PHP_PPV_2020/view/pisosVista.php");
}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}

?>

