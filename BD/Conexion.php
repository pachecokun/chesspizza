<?php
class Conexion{
    private static $conexion = null;

    const HOST = 'localhost';


    public function execute($query,$args=array()){
        $con = $this->getConexion();
        $stm = $con->prepare($query);
        if(sizeof($args)==0){
            return $stm->execute();
        }
        else{
            return $stm->execute($args);
        }
    }

    private function getConexion(){
        if(is_null(self::$conexion)){
            self::$conexion = new PDO("mysql:host=localhost","root","root");
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexion;
    }
}