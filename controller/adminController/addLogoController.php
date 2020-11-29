<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/logoModel.php';

if(isset($_POST)|| isset($_SESSION['idUsuario'])) {
    session_start();
    $nombre_img = $_FILES['imagen']['name'];
    $extension = pathinfo($nombre_img, PATHINFO_EXTENSION);

//Se mueve la imagen al servidor
    $directorio = '/DWES_PHP_PPV_2020/images/';
    move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $directorio . $nombre_img);

    $imagen = $directorio . $nombre_img;
    $idAdmin = $idAdmin = intval($_SESSION['idUsuario']);

    $logo = new logoModel();

    if ($logo->addLogo($imagen,$idAdmin)) {
        header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/addLogo.php");
    } else {
        die();
    }
}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}
?>

