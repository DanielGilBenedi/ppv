<?php

function timeout(){
   include ('cerrarSesionController.php');

    if (isset($_SESSION['idUsuario'])){

        if ((time()-$_SESSION['logintime']) > 300){

            cerrarSesion();
        }else{
            $_SESSION['loginTime']=time();

        }
    }
}
?>
