<?php require_once $_SERVER['DOCUMENT_ROOT'].
    '/DWES_PHP_PPV_2020/model/usuariosModel.php';

        $id = $_POST['id'];
        $users = new usuariosModel();
        $datos = $users->eliminarUsuario($id);

        if($datos){
            header("Location: /../../DWES_PHP_PPV_2020/controller/cerrarSesionController.php");
        }





?>


