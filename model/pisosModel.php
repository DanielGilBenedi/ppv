<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/conexion_BBDD.php';

class pisosModel
{
    private $conectar;
    private $conexion;
    private $pisos;

    public function __construct(){
        $this->conectar = new Conectar_Database();
        $this->conexion = $this -> conectar->getconection();
        $this->pisos = array();
    }

    public function getPisos() {

        $consulta = $this->conexion->query("select * from pisos;");

        while ($filas = $consulta->fetch_assoc()) {
            $this->pisos[] = $filas;
        }
        return $this->pisos;

    }

    public function addPisos($descripcion, $titulo, $foto, $telefono, $precio, $num_habitaciones, $distancia){

        $sql = "INSERT INTO pisos(descripcion, titulo, foto, telefono, precio, num_habitaciones, distancia) VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('ssssdid',$descripcion, $titulo, $foto, $telefono, $precio, $num_habitaciones, $distancia);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    public function getPisosId($id) {

        $consulta = $this->conexion->query("select * from pisos where id = $id;");

        while ($filas = $consulta->fetch_assoc()) {
            $this->pisos[] = $filas;
        }
        return $this->pisos;

    }

    public function deletePiso($id){
        $sql = "DELETE FROM `pisos` WHERE `id` = $id;";
        $consulta = $this->conexion->query($sql);

        if ($consulta === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function paginacionPisos(){
        $result = $this->conexion->query('SELECT COUNT(*) as total_pisos FROM pisos');
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_pisos'];

        return $num_total_rows;
    }

    public function modificarPisos($id,$descripcion, $titulo, $foto, $telefono, $precio, $num_habitaciones, $distancia){

        $sql = "UPDATE pisos SET descripcion='$descripcion',
        titulo = '$titulo', telefono = '$telefono', precio = '$precio',
        num_habitaciones='$num_habitaciones', foto='$foto', distancia = '$distancia' WHERE id = '$id' ";

        $consulta = $this->conexion->query($sql);

        if ($consulta === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>