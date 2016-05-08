<?php

include_once('../BD/Conexion.php');
include_once('../Model/Producto.php');

class ProductoDAO implements DAO
{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Producto");

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
            Conexion::execute("insert into Producto values($,$,$)",array($obj->getId(),$obj->getTipo(),$obj->getPrecio()));
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

}
?>