<?php
include ('sideVar.php');
if(isset($_SESSION)){
require_once ($_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/base.php');?>



<div class="container" style="width: 60%">
    <?php foreach ($_SESSION['datos'] as $dato){
        if($_SESSION['idUsuario'] ==$dato['id']){
           $nombre= $dato['nombre'];
           $apellidos = $dato["apellidos"];
           $edad = $dato["edad"];
           $telefono =  $dato["telefono"];
           $email = $dato["email"];
           $usuario = $dato["usuario"];
           $contrasea = $dato["contrasena"];
        }

    }
    ?>

        <h2>Perfil </h2>
        <p>Rol: administrador</p>
        <div class="form-group" >
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="nombre" placeholder="<?php echo $nombre ?>"></div>

                <div class="col"><input type="text" class="form-control" name="apellidos" placeholder="<?php echo $apellidos ?>"></div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="usuario" placeholder="<?php echo $usuario ?>">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="edad" placeholder="<?php echo $nombre ?>" >
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="telefono" placeholder="<?php echo $telefono ?>">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="<?php echo $email ?>" >
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="contrasena" placeholder="<?php echo $contrasea ?>">
        </div>


</div>
<?php }else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
} ?>