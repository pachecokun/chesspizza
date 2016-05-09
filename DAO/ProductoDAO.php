<?php

include_once(__DIR__.'/../Model/Producto.php');
include_once(__DIR__.'/DAO.php');

class ProductoDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Producto where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Producto($obj['id'],$obj['tipo'],$obj['precio']);
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
            Conexion::execute("insert into Producto(tipo,precio) values(?,?)",array($obj->getTipo(),$obj->getPrecio()));
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
            Conexion::execute("update Producto set tipo=?,precio=?, where id = ?",array($obj->getTipo(),$obj->getPrecio(),$obj->getId()));
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
            Conexion::execute("delete from Producto where id=?",array($id));
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
            $stm = Conexion::execute("SELECT * FROM Producto where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Producto($obj['id'],$obj['tipo'],$obj['precio']);
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