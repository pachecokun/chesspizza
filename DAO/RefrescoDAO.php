<?php

include_once(__DIR__.'/../Model/Refresco.php');
include_once(__DIR__.'/DAO.php');

class RefrescoDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Refresco where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Refresco($obj['id'], $obj['nombre'], $obj['precio']);
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
            Conexion::execute("insert into Refresco values(null,?,?)", array($obj->getNombre(), $obj->getPrecio()));
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
            Conexion::execute("update Refresco set nombre=?,precio=? where id = ?", array($obj->getNombre(), $obj->getPrecio(), $obj->getId()));
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
            Conexion::execute("delete from Refresco where id=?", array($id));
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
            $stm = Conexion::execute("SELECT * FROM Refresco where id=?", array($id));

            if ($obj = $stm->fetch()) {
                return new Refresco($obj['id'], $obj['nombre'], $obj['precio']);
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
        $res = array();
        $stm = Conexion::execute("SELECT * FROM orden_refresco where Orden_id = ?", array($id));
        while ($row = $stm->fetch()) {
            $obj = self::get($row['Refresco_id']);
            $obj->cantidad = $row['cantidad'];
            $res[] = $obj;
        }
        return $res;
    }

}
?>