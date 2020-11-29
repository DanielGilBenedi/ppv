<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/conexion_BBDD.php';
class logoModel
{
    private $conectar;
    private $conexion;
    private $logos;

    public function __construct(){
        $this->conectar = new Conectar_Database();
        $this->conexion = $this -> conectar->getconection();
        $this->logos;
    }

    public function addLogo($logoImg,$idAdmin){

        $sql = "INSERT INTO logo(logo,id_usuario) VALUES (?,?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('si',$logoImg,$idAdmin);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    public function getLogo(){
        $consulta = $this->conexion->query("select * from logo
    ORDER BY id DESC LIMIT 1;");

        while ($filas = $consulta->fetch_assoc()) {
            $this->logos = $filas;
        }

        return $this->logos;
    }
}