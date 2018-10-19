<?php

class Conexion{

    private $serverName ="GO SQL SERVER AND PUT YOUR SERVER NAME";
    private $usr="USER SQL (maybe sa)";
    private $pwd="your password";
    private $db="your database";
    private $conn;

    // Contenedor Instancia de la clase
    private static $instance = NULL;
   
    // Constructor privado, previene la creación de objetos vía new
    private function __construct() {

        $connectionInfo = array("UID" => $this->usr, "PWD" => $this->pwd, "Database" => $this->db);
        $this->conn = sqlsrv_connect($this->serverName, $connectionInfo);

    }

    // Clone no permitido
    private function __clone() { }

    // Método singleton 
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Conexion();
        }

        return self::$instance;
    }


    public function getConnection(){
        return $this->conn;
    }
}
