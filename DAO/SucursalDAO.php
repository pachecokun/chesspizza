<?php

include_once(__DIR__.'/BD/Conexion.php');
include_once(__DIR__.'/Model/Sucursal.php');
include_once(__DIR__.'/DAO.php');

class SucursalDAO implements DAO
{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Sucursal");

            while ($obj = $stm->fetch()) {
                $sucs[] = new Sucursal($obj['id'],$obj['direccion'],$obj['lat'],$obj['lon'],$obj['nombre']);
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
            Conexion::execute("insert into Sucursal values($,$,$,$,$)",array($obj->getId(),$obj->getDireccion(),$obj->getLat(),$obj->getLon(),$obj->getNombre()));
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
            Conexion::execute("update Sucursal set direccion=?, lat=?, lon=?, nombre=? where id = ?",array($obj->getDireccion(),$obj->getLat(),$obj->getLon(),$obj->getNombre(),$obj->getId()));
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
            Conexion::execute("delete from Sucursal where id=?",array($id));
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
