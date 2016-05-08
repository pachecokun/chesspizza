<?php

include_once('BD/Conexion.php');
include_once('Model/Sucursal.php');

class SucursalesDAO
{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Sucursal");

            while ($suc = $stm->fetch()) {
                $sucs[] = new Sucursal($suc['id'], $suc['direccion'], $suc['lat'], $suc['lon'], $suc['nombre']);
            }
            return $sucs;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        } catch (Error $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
?>
