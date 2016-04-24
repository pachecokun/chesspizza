<?php

include_once('../BD/Conexion.php');

class SucursalesDAO{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("select*from Sucursal");
            
            while($suc = $stm->fetch()){
                $sucs[]=new Sucursal($suc['id'],$suc['Direccion'],$suc['Lat'],$suc['Lon']);
            }

            return $sucs;

        }catch (Exception $e){
            echo $e->getMessage();
            return null;
        }
    }
}
?>