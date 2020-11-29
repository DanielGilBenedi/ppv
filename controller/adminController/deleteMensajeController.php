<?php
if(isset($_POST)) {
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/mensajesModel.php';

$id = $_POST['id'];

$mensajes = new mensajesModel();
$datos = $mensajes->deleteMensaje($id);

header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/mensajeView.php");

}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}

?>