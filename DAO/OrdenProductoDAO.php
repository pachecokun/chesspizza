<?php

include_once(__DIR__ . '/../Model/OrdenProducto.php');
include_once(__DIR__ . '/DAO.php');
include_once(__DIR__ . '/PizzaDAO.php');
include_once(__DIR__ . '/EspecialDAO.php');
include_once(__DIR__ . '/PaqueteDAO.php');
include_once(__DIR__ . '/RefrescoDAO.php');

class OrdenProductoDAO implements DAO
{
    public static function getAll($cond = "1=1", $args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM orden_producto where " . $cond, $args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new OrdenProducto($obj['Orden_id'], $obj['precio'], $obj['cantidad'], ProductoDAO::get($obj['Producto_id']));
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
            Conexion::execute("insert into orden_producto values(?,?,?,?)", array($obj->getOrdenId(), $obj->getProducto()->getId(), $obj->getPrecio(), $obj->getCantidad()));
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
            Conexion::execute("update orden_producto set precio=?,cantidad=? where Orden_id = ? and Producto_id = ?", array($obj->getPrecio(), $obj->getCantidad(), $obj->getOrdenId(), $obj->getProductoId()));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function delete($Producto_id)
    {
        try {
            Conexion::execute("delete from orden_producto where Producto_id=?", array($Producto_id));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public static function get($orden, $prod = null)
    {
        try {
            $stm = Conexion::execute("SELECT * FROM orden_producto where Producto_id=? and Orden_id=?", array($prod, $orden));

            if ($obj = $stm->fetch()) {
                return new OrdenProducto($obj['Orden_id'], $obj['precio'], $obj['cantidad'], ProductoDAO::get($obj['Producto_id']));
            } else {
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