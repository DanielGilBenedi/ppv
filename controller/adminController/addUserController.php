<?php
if(isset($_POST)) {
require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/model/conexion_BBDD.php';

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$usuario = $_POST['usuario'];
$edad = $_POST['edad'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$conectar = new Conectar_Database();
$conexion= $conectar->getconection();
$rol = 'administrador';
$sql = "INSERT INTO usuarios(nombre, apellidos, edad, telefono, email,rol, contrasena, usuario) VALUES (?,?,?,?,?,?,?,?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param('ssisssss',$nombre,$apellidos,$edad,$telefono,$email,$rol,$contrasena,$usuario);
$stmt->execute();
$result = $stmt->close();

if($result){
    echo ('<script> alert("Usuario agregado con exito!");</script>');
    header("Location: /../DWES_PHP_PPV_2020/view/adminPanel/adminView.php");
}
echo '<br><br>';echo '<br><br>';
}else{
    header("Location: /../../DWES_PHP_PPV_2020/index.php");
}

?>
