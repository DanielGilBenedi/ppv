<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/conexion_BBDD.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$conectar = new Conectar_Database();
$conexion= $conectar->getconection();

$sql = "SELECT * from usuarios where usuario = '$usuario' ";


if(($result = $conexion -> query($sql))){

    while ($obj = $result->fetch_object()) {
        $userRol = ($obj->rol);
        $user = ($obj->usuario);
        $idUser = ($obj->id);
    }
    session_start();
    $_SESSION['logintime'] = time();
    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
    $_SESSION['loggedin'] = true;
    $_SESSION['idUsuario'] = $idUser;
    $_SESSION['usuario'] = $user;
    $_SESSION['rol'] = $userRol;

    if($userRol=="administrador"){
        header("Location: ../controller/adminController/adminView.php");
    }else{
        header("Location: /DWES_PHP_PPV_2020/index.php");
    }

}else{


}


/*function cerrarSesionPorTiempo(){

    if ($_SESSION["loggedin"] = false) {
        //si no está logueado lo envío a la página de autentificación
        header("Location: ../index.php");
    } else {
        //sino, calculamos el tiempo transcurrido
        $fechaGuardada = $_SESSION["ultimoAcceso"];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

        //comparamos el tiempo transcurrido
        if($tiempo_transcurrido >= 6) {
            //si pasaron 10 minutos o más
            session_destroy(); // destruyo la sesión
            header("Location: ../view/login.php"); //envío al usuario a la pag. de autenticación
            //sino, actualizo la fecha de la sesión
        }else {
            $_SESSION["ultimoAcceso"] = $ahora;
        }
    }


}
cerrarSesionPorTiempo();*/
$conexion->close();

?>
