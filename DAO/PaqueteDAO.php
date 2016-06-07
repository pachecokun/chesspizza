<?php

include_once(__DIR__.'/../Model/Paquete.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/EspecialDAO.php');
include_once(__DIR__ . '/RefrescoDAO.php');

class PaqueteDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Paquete where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Paquete($obj['id'], EspecialDAO::get($obj['Especial_id']), RefrescoDAO::get($obj['Refresco_id']), $obj['nombre'], $obj['precio']);
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
            Conexion::execute("insert into Paquete values(?,?,?,?,?)", array($obj->getId(), $obj->getEspecial()->getId(), $obj->getRefresco->getId(), $obj->getNombre(), $obj->getPrecio()));
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
            Conexion::execute("update Paquete set Refresco_id=?, =?, Especial_id = ?, nombre = ?,precio = ? where id = ?", array($obj->getRefreascoProductoId(), $obj->getEspecialId(), $obj->getNombre(), $obj->getId(), $obj->getPrecio()));
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
            Conexion::execute("delete from Paquete where id=?", array($id));
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
            $stm = Conexion::execute("SELECT * FROM Paquete where id=?", array($id));

            if ($obj = $stm->fetch()) {
                return new Paquete($obj['id'], EspecialDAO::get($obj['Especial_id']), RefrescoDAO::get($obj['Refresco_id']), $obj['nombre'], $obj['precio']);
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
        $stm = Conexion::execute("SELECT * FROM orden_paquete where Orden_id = ?", array($id));
        while ($row = $stm->fetch()) {
            $obj = self::get($row['Paquete_id']);
            $obj->tamano_pizza = $row['tamano_pizza'];
            $obj->orilla = OrillaDAO::get($row['orilla_id']);
            $obj->cantidad = $row['cantidad'];
            $res[] = $obj;
        }
        return $res;
    }

}
?>