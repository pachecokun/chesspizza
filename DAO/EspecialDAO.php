<?php

include_once(__DIR__.'/../Model/Especial.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/PizzaDAO.php');

class EspecialDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM especial where " . $cond, $args);

            while ($obj = $stm->fetch()) {
                $pizza = PizzaDAO::get($obj['Pizza_id']);
                $sucs[] = new Especial($obj['Producto_id'], $obj['precio'], $obj['nombre'], $pizza);
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
            Conexion::execute("insert into especial(producto_id,precio,Pizza_id,nombre) values(?,?,?)", array($obj->getProductoId(), $obj->getPrecio(), $obj->getPizza()->getId(), $obj->getNombre()));
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
            Conexion::execute("update especial set precio=?, Pizza_id=? where Producto_id = ?", array($obj->getPrecio(), $obj->getPizza()->getId(), $obj->getNombre(), $obj->getId()));
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
            Conexion::execute("delete from especial where Producto_id=?", array($id));
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
            $stm = Conexion::execute("SELECT * FROM especial where Producto_id=?", array($id));

            if ($obj = $stm->fetch()) {
                $pizza = PizzaDAO::get($obj['Pizza_id']);
                return new Especial($obj['Producto_id'], $obj['precio'], $obj['nombre'], $pizza);
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