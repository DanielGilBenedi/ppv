<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/conexion_BBDD.php';

class mensajesModel
{
    private $conectar;
    private $conexion;
    private $mensajes;

    public function __construct(){
        $this->conectar = new Conectar_Database();
        $this->conexion = $this -> conectar->getconection();
        $this->mensajes = array();
    }

    public function subirMensaje($mensaje, $idUsuario, $idPiso){
        $dia = date("Y-m-d");
        $sql = "INSERT INTO `mensajes`(cuerpo, id_usuario, fecha, id_piso)VALUES (?,?,?,?)";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('sisi',$mensaje,$idUsuario,$dia, $idPiso);
        $stmt->execute();
        $stmt->close();
    }

    public function mostrarMensajes(){
        $consulta = $this->conexion->query("select * from mensajes;");

        while ($filas = $consulta->fetch_assoc()) {
            $this->mensajes[] = $filas;
        }
        return $this->mensajes;

    }

    public function mostrarMensajesPorUsuario($idUsuario){
        $consulta = $this->conexion->query("select * from mensajes where id_usuario = $idUsuario;");

        while ($filas = $consulta->fetch_assoc()) {
            $this->mensajes[] = $filas;
        }
        return $this->mensajes;

    }

    public function paginacionMensajes(){
        $result = $this->conexion->query('SELECT COUNT(*) as total_mensajes FROM mensajes');
        $row = $result->fetch_assoc();
        $num_total_rows = $row['total_mensajes'];

        return $num_total_rows;
    }

    public function deleteMensaje($id){
        $sql = "DELETE FROM `mensajes` WHERE `id` = $id;";
        $consulta = $this->conexion->query($sql);

        if ($consulta === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function marcarVisto($id){
        $sql = "UPDATE `mensajes` SET visto= 1 WHERE id = $id ";
        $consulta = $this->conexion->query($sql);
        if ($consulta === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}
?>