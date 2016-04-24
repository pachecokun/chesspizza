<?php
class Conexion{
    private static $conexion = null;

    const HOST = 'localhost';
    const DB = 'pizza';
    const usr = 'root';
    const pass = 'escomlaweafome';


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
        try{
            if(is_null(self::$conexion)){
                self::$conexion = new PDO("mysql:host=".self::HOST." port=3306  dbname=".self::DB."",self::usr,self::pass);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            return self::$conexion;
        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }
}
?>