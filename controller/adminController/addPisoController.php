<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/pisosModel.php';

if(isset($_POST)) {
    $nombre_img = $_FILES['imagen']['name'];
    $extension = pathinfo($nombre_img, PATHINFO_EXTENSION);

//Se mueve la imagen al servidor
    $directorio = '/DWES_PHP_PPV_2020/images/';
    move_uploaded_file($_FILES['imagen']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $directorio . $nombre_img);


    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $imagen = $directorio . $nombre_img;
    $telefonoMsg = $_POST['telefonoMsg'];
    $precio = $_POST['precio'];
    $numHabitaciones = $_POST['numHabitaciones'];
    $distancia = $_POST['distancia'];

    $piso = new pisosModel();


    if ($piso->addPisos($descripcion, $titulo, $imagen, $telefonoMsg, $precio, $numHabitaciones, $distancia)) {
        header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/addPisos.php");
    } else {
        die();
    }
}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}
?>
