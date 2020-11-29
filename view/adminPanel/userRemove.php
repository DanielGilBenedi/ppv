<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');

?>


<style>
    th, td {

        width: 100px;
        word-wrap: break-word;
    }
</style>
<br>
<div class="container mt-5 " style="width: 75%; margin-left: 20%; ">
    <h2>Baja Usuario</h2>
    <form >
<table class="table table-bordered ">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Edad</th>
        <th scope="col">Telefono</th>
        <th scope="col">Email</th>
        <th scope="col">Usuario</th>
        <th scope="col">Rol</th>

    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($_SESSION['datos'] as $dato){
        echo('
            
                <tr>        
                    <form method="post" action="../../controller/adminController/userRemoveController.php">
                    <th class="datos"><input type="hidden" name="id" value=" '. $dato["id"].'">'. $dato["id"] . '</th> 
                    <th>'. $dato["nombre"] .'</th> 
                    <th>'. $dato["apellidos"] .'</th>
                    <th>'. $dato["edad"] .'</th> 
                    <th>'. $dato["telefono"] .'</th> 
                    <th>'. $dato["email"] .'</th> 
                    <th >'. $dato["usuario"] .'</th> 
                    <th >'. $dato["rol"] .'</th> 
                    <th><input type="submit" class="btn btn-primary" value="Eliminar"></th>
                    </form>
                   
                </tr>');
    }

    ?>


    </tbody>
</table>


</div>

<?php  }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}?>