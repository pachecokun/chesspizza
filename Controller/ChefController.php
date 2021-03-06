<?php
require_once __DIR__ . "/../DAO/OrdenDAO.php";

/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 6/5/2016
 * Time: 17:10 PM
 */
class ChefController
{
    public static function getOrdenesDeSucursal($idSucursal)
    {

        $ordenes = OrdenDAO::getAll("Sucursal_id = ?", array($idSucursal));
        $array = array();
        foreach ($ordenes as $orden) {
            $ultimaOperacion = $orden->getUltimaOperacion();
            if ($ultimaOperacion != null) {
                $status = $ultimaOperacion->getStatus();
                if ($status->getId() == STATUS_CONFIRMADA || $status->getId() == STATUS_HORNO) {
                    $array[] = $orden;
                }
            }
        }
        /* if ($ordenes == null) {
             $_SESSION['message'] = array("danger", "Hubo un error la base de datos");
             //header("location: /");
         }*/
        return $array;
    }
}