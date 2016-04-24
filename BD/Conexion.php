<?php
class Conexion{
    private static $conexion = null;

    const HOST = 'localhost';


    public static function execute($query,$args=array()){
        $con = self::getConexion();
        $stm = $con->prepare($query);
        if(sizeof($args)==0){
            $stm->execute();
        }
        else{
            $stm->execute($args);
        }
        return $stm;
    }

    private static function getConexion(){
        if(is_null(self::$conexion)){
            self::$conexion = new PDO("mysql:host=localhost","root","root");
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$conexion;
    }
}