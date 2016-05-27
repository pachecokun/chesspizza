<?php

require_once __DIR__ . "/../DAO/OrdenDAO.php";

class OrdenController
{
    public static function setDatosOrden($nombre, $tel, $direccion, $lat, $lon)
    {
        session_start();
        $_SESSION['nom'] = $nombre;
        $_SESSION['tel'] = $tel;
        $_SESSION['dir'] = $direccion;
        $_SESSION['lat'] = $lat;
        $_SESSION['lon'] = $lon;
    }

    public static function getDatosOrden()
    {
        session_start();
        return array(
            'nom' => $_SESSION['nom'],
            'tel' => $_SESSION['tel'],
            'dir' => $_SESSION['dir'],
            'lat' => $_SESSION['lat'],
            'lon' => $_SESSION['lon']
        );
    }
}