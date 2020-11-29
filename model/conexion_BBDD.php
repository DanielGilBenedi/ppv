<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/DWES_PHP_PPV_2020/config/bbddConfig.php';

class Conectar_Database
{

    private $hostname = HOST_NAME;
    private $database = DATABASE_NAME;
    private $user = USER;
    private $password = PASSWORD;
    private $conexion;


    function getconection()
    {

            $this->conexion = new mysqli($this->hostname ,$this->user,
                $this->password ,$this->database
            );

            if ($this->conexion ->connect_error) {
                die("Connection failed: " . $this->conexion->connect_error);
            }

            return $this->conexion;


    }
}
