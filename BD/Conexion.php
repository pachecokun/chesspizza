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
                $str = "mysql:host=".self::HOST."\nport=3306\ndbname=".self::DB;
                echo $str;
                self::$conexion = new PDO($str,self::usr,self::pass);
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