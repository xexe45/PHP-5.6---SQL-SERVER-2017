<?php
require_once('Conexion.php');

class Articles{

    private $instancia;
    private $conexion;

    public function __construct(){

        $this->instancia = Conexion::getInstance();
        $this->conexion = $this->instancia->getConnection();

    }

    public function getAll(){

        $sql = "SELECT * FROM articles";

        try{

            $articles = [];
            $res = sqlsrv_query($this->conexion,$sql);

            while($result = sqlsrv_fetch_array($res)){

                $articles[] = $result;

            }

            return $articles;

        }catch(Exception $e){

            echo $e->getMessage();

        }
        
    }

    public function __destruct(){
        sqlsrv_close( $this->conexion );
    }
}