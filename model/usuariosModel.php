<?php require_once $_SERVER['DOCUMENT_ROOT']. '/DWES_PHP_PPV_2020/model/conexion_BBDD.php';
?>
<?php
class usuariosModel
{
    private $conectar;
    private $conexion;
    private $usuarios;

    public function __construct()
    {
        $this->conectar = new Conectar_Database();
        $this->conexion = $this->conectar->getconection();
        $this->usuarios = array();
    }

    public function getUsers()
    {

        $consulta = $this->conexion->query("select * from usuarios;");

        while ($filas = $consulta->fetch_assoc()) {
            $this->usuarios[] = $filas;
        }

        return $this->usuarios;

    }
    public function cambiarConstrasena($id,$nuevaContrasena){
        $sql = "UPDATE usuarios SET contrasena='$nuevaContrasena', WHERE id = '$id' ";
        $consulta = $this->conexion->query($sql);
        if ($consulta === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function  cambiarDatosUsuario($id,$nombre,$apellidos,$edad,$telefono,$usuario,$email){
        $sql = "UPDATE usuarios SET nombre='$nombre',
        apellidos = '$apellidos', edad = '$edad', telefono = '$telefono',
        email='$email', usuario = '$usuario' WHERE id = '$id' ";

        $consulta = $this->conexion->query($sql);

        if ($consulta === TRUE) {
            return true;
        } else {
            return false;
        }

    }

    public function eliminarUsuario($id){
        $sql = "DELETE FROM usuarios WHERE id = $id";
        $consulta = $this->conexion->query($sql);

        if ($consulta === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
