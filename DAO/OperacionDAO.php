<?php

include_once('../BD/Conexion.php');
include_once('../Model/Sucursal.php');

class OperacionDAO implements DAO
{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Operacion");

            while ($obj = $stm->fetch()) {
                $sucs[] = new Operacion($obj['id'],$obj['Orden_id'],$obj['fecha_hora'],$obj['lat'],$obj['lon']);
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
            Conexion::execute("insert into Operacion values($,$,$,$,$)",array($obj->getId(),$obj->getOrdenId(),$obj->getFechaHora(),$obj->getLat(),$obj->getLon()));
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
            Conexion::execute("update Operacion set Orden_id=?,decha_hora=?,lat=?,lon=? where id = ?",array($obj->getOrdenId(),$obj->getFechaHora(),$obj->getLat(),$obj->getLon(),$obj->getId()));
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

}
?>