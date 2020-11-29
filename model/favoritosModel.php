<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/conexion_BBDD.php';


class favoritosModel
{
    private $conectar;
    private $conexion;
    private $favoritos;

    public function __construct(){
        $this->conectar = new Conectar_Database();
        $this->conexion = $this -> conectar->getconection();
        $this->favoritos = array();
    }

    function addFavoritos($idPiso, $idUsuario){
        $sql = "INSERT INTO favoritos(id_usuario,id_piso) VALUES (?,?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('ii',$idUsuario,$idPiso);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    function selectFavoritos($idUsuario)
    {

        $consulta = $this->conexion->query("SELECT * FROM `favoritos` where `id_usuario` =$idUsuario ");

        while ($filas = $consulta->fetch_assoc()) {
            $this->favoritos[] = $filas;
        }
        return $this->favoritos;
    }

    function deleteFavoritos($id, $idUser){

        $sql = "DELETE FROM `favoritos` WHERE  `id_usuario` = $idUser and `id_piso`=$id;";

        $consulta = $this->conexion->query($sql);

        if($consulta === true){
            return true;
        }else{
            return false;
        }
    }
    public function paginacionFavoritos(){
        $result = $this->conexion->query('SELECT COUNT(*) as total_favoritos FROM favoritos');

        $row = $result->fetch_assoc();

        $num_total_rows = $row['total_favoritos'];

        return $num_total_rows;
    }


    }




?>