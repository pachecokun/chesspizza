<?php

include_once('../BD/Conexion.php');

class SucursalesDAO{
    public static function getAll()
    {
        try {
            return Conexion::execute("select*from Sucursal");
        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }
}
?>