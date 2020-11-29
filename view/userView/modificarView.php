<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');?>

<?php
session_start();
foreach ($_SESSION['datos'] as $dato) {
    if ($_SESSION['idUsuario'] == $dato['id']) {
        $id = $dato['id'];
        $nombre = $dato['nombre'];
        $apellidos = $dato["apellidos"];
        $edad = $dato["edad"];
        $telefono = $dato["telefono"];
        $email = $dato["email"];
        $usuario = $dato["usuario"];
        $contrasea = $dato["contrasena"];
    }

}
$_SESSION['idUsuario'] = $id;
?>

<script>
    function a(){

        var nombre = document.getElementById('nombre').value;
        var apellidos = document.getElementById('apellidos').value;
        var edad = document.getElementById('edad').value;
        var telefono = document.getElementById('telefono').value;
        var email = document.getElementById('email').value;
        var usuario = document.getElementById('usuario').value;

        if(nombre!="" && apellidos!= "" && edad!="" && telefono!=""
            && email!="" && usuario!=""){
            alert('Cambio realizado!');
            return true;
        }
        else{
            alert('Rellena todos los campos');
            return false;

        }


    }
</script>

<div class="container mt-5 align-content-center" style="width: 60%">
    <h2>Perfil </h2>
    <p>Rol: administrador</p>
    <form method="post" action="../../controller/userController/modificarUsuarioController.php" onsubmit="return a()">
        <div class="form-group" >
            <div class="row">
                <div class="col">Nombre<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre ?>"></div>

                <div class="col">Apellidos<input type="text" class="form-control"id="apellidos" name="apellidos" value="<?php echo $apellidos ?>"></div>
            </div>
        </div>
        <div class="form-group">Usuario
            <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario ?>">
        </div>
        <div class="form-group">Edad
            <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $edad ?>" >
        </div>

        <div class="form-group">Telefono
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono ?>">
        </div>

        <div class="form-group">Email
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" >
        </div>


        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
</div>



<?php  }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}?>


