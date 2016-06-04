<?php

include_once(__DIR__.'/../Model/Sucursal.php');
include_once(__DIR__.'/DAO.php');

class SucursalDAO implements DAO
{
    public static function getAll($cond= "1=1")
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Sucursal where ".$cond);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Sucursal($obj['id'],$obj['direccion'],$obj['lat'],$obj['lon'],$obj['nombre'], $obj['password']);
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
            Conexion::execute("insert into Sucursal(direccion,lat,lon,nombre, password) values(?,?,?,?,?)",array($obj->getDireccion(),$obj->getLat(),$obj->getLon(),$obj->getNombre(),$obj->getPassword()));
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
            Conexion::execute("update Sucursal set direccion=?, lat=?, lon=?, nombre=?, password=? where id = ?",array($obj->getDireccion(),$obj->getLat(),$obj->getLon(),$obj->getNombre(),$obj->getPassword(), $obj->getId()));
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


    public static function get($id)
    {
        try {
            $stm = Conexion::execute("SELECT * FROM Sucursal where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Sucursal($obj['id'],$obj['direccion'],$obj['lat'],$obj['lon'],$obj['nombre'],$obj['password']);
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

}
?>
