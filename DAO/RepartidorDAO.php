<?php

include_once(__DIR__.'/../Model/Repartidor.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/EmpleadoDAO.php');
include_once(__DIR__ . '/OrdenDAO.php');

class RepartidorDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Repartidor where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Repartidor($obj['status'], EmpleadoDAO::get($obj['id']));
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

    public static function save($obj)
    {
        try {
            Conexion::execute("insert into Repartidor values(?,?)", array($obj->getEmpleado()->getId(), $obj->getStatus()));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function update($obj)
    {
        try {
            Conexion::execute("update Repartidor set status=? where id = ?", array($obj->getStatus(), $obj->getEmpleado()->getId()));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function delete($id)
    {
        try {
            Conexion::execute("delete from Repartidor where id=?",array($id));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public static function get($id)
    {
        try {
            $stm = Conexion::execute("SELECT * FROM Repartidor where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Repartidor($obj['status'], EmpleadoDAO::get($obj['id']));
            }
            else {
                return null;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        } catch (Error $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public static function getSucursal($suc)
    {
        return self::getAll("id in(select distinct id from empleado where Sucursal_id=?);", array($suc->getId()));
    }

    public static function getDisponiblesSucursal($suc)
    {
        return self::getAll("id in(select distinct id from empleado where Sucursal_id=?) and status = 0;", array($suc->getId()));
    }

    public static function getRuta($rep)
    {
        if ($rep->getStatus() == 0) {
            return array();
        }
        $res = array();
        $ordenes = OrdenDAO::getAll("Repartidor_id = ?", array($rep->getEmpleado()->getId()));
        foreach ($ordenes as $orden) {
            if ($orden->getUltimaOperacion()->getStatus()->getId() == STATUS_EN_CAMINO) {
                $res[] = $orden;
            }
        }
        return $res;
    }

    public static function getOcupados()
    {
        return self::getAll("status = 1");
    }
}
?>