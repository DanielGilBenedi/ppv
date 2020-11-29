<?php
if(isset($_POST)) {
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/pisosModel.php';

$id = $_POST['id'];

$pisos = new pisosModel();
$datos = $pisos->deletePiso($id);


header("Location: /../../DWES_PHP_PPV_2020/view/adminPanel/borrarPiso.php");

}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}

?>
