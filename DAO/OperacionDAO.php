<?php

include_once(__DIR__.'/../Model/Operacion.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/StatusDAO.php');

class OperacionDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Operacion where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Operacion($obj['id'], $obj['Orden_id'], $obj['fecha_hora'], $obj['lat'], $obj['lon'], StatusDAO::get($obj['Status_id']));
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
            Conexion::execute("insert into Operacion(Orden_id,fecha_hora,lat,lon,Status_id) values(?,now(),?,?,?)", array($obj->getOrdenId(), $obj->getLat(), $obj->getLon(), $obj->getStatus()->getId()));
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
            Conexion::execute("update Operacion set Orden_id=?,decha_hora=?,lat=?,lon=?,Status_id=? where id = ?", array($obj->getOrdenId(), $obj->getFechaHora(), $obj->getLat(), $obj->getLon(), $obj->getId(), $obj->getStatus()->getId()));
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
            Conexion::execute("delete from Operacion where id=?",array($id));
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
            $stm = Conexion::execute("SELECT * FROM Operacion where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Operacion($obj['id'], $obj['Orden_id'], $obj['fecha_hora'], $obj['lat'], $obj['lon'], StatusDAO::get($obj['Status_id']));
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

    public static function getOrden($id)
    {
        return self::getAll("Orden_id=?", array($id));
    }

}
?>