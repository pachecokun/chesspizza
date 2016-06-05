<?php
class Conexion{
    private static $conexion = null;

    const HOST = 'localhost';
    const DB = 'pizza2';
    const USER = 'root';
    const PASS = 'root';


    public static function execute($query,$args=array()){
        echo '<script>alert("' . $query . '")</script>';
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
                $str = "mysql:host=".self::HOST.";port=3306;dbname=".self::DB;
                self::$conexion = new PDO($str,self::USER,self::PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
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