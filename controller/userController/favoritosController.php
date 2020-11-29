<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/favoritosModel.php';
session_start();

if(isset($_GET['id'])){
    $idPiso = trim($_GET['id']);
    $idPiso = intval($idPiso);

    $idUser =$_SESSION['idUsuario'];
    $user = new favoritosModel();
    $numFavoritos = $user->paginacionFavoritos();
    $_SESSION['numFavoritos'] = $numFavoritos;
    $datos = $user->selectFavoritos($idUser);
    $idPisoBase = 0;
    $idTabla = "";
    foreach ($datos as $dato){
       $idPisoBase = intval($dato['id_piso']);
       $idTabla = $dato['id'];
    }
    var_dump($idPisoBase);
    var_dump($idPiso);
    if($idPisoBase==$idPiso){

        $user->deleteFavoritos($idTabla);
        header("Location: /../../DWES_PHP_PPV_2020/view/pisosVista.php");
    }else{

        $user->addFavoritos($idPiso,$idUser);
        header("Location: /../../DWES_PHP_PPV_2020/view/pisosVista.php");
    }

}else{
    header("Location: /../../DWES_PHP_PPV_2020/view/pisosVista.php");
}


?>
