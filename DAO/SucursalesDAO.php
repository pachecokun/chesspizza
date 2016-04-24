<?php

include_once('../BD/Conexion.php');

class SucursalesDAO{
    public static function getAll()
    {
        return Conexion::execute("select*from sucursal");
    }
}
?>