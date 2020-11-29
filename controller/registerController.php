<?php

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

$sql = "INSERT INTO usuarios(nombre, apellidos, edad, telefono, email, contrasena, usuario) VALUES (?,?,?,?,?,?,?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param('ssissss',$nombre,$apellidos,$edad,$telefono,$email,$contrasena,$usuario);
$stmt->execute();
$result = $stmt->close();

if($result){
    header("Location: ../index.php");
}

?>

