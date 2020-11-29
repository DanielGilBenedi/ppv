<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');?>

<?php
session_start();
?>
<script>
    function a(){

        var contrasenaNueva = document.getElementById('contrasenaNueva').value;
        var contrasenaRepetir = document.getElementById('contrasenaRepetir').value;

        if(contrasenaNueva == contrasenaRepetir){
            alert('Contraseña cambiada con exito!');
            return true;

        }
        else{
            alert('Los campos no coinciden');
            return false;

        }


    }
</script>

<div class="container mt-5 align-content-center" style="width: 60%">
    <?php foreach ($_SESSION['datos'] as $dato){
        if($_SESSION['idUsuario'] ==$dato['id']){
            $usuario = $dato["usuario"];
        }

    }
    ?>
    <h2>Perfil </h2>
    <p>Rol: administrador</p>
    <form method="post" action="../../controller/userController/cambioContraseñaController.php" onsubmit="return a()">

        <div class="form-group" id="password" >Contraseña


            <input type="text" class="form-control" id="contrasenaNueva" name="contrasenaNueva" placeholder="Nueva contraseña"><br>
            <input type="text" class="form-control" id="contrasenaRepetir" name="contrasenaRepetir" placeholder="Repite la contraseña">
        </div>

        <button type="submit" class="btn btn-primary">Modificar Contraseña</button>
    </form>
</div>

<?php  }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}?>





