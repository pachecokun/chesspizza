<?php

include_once(__DIR__.'/../Model/Especial.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/PizzaDAO.php');
include_once(__DIR__ . '/OrillaDAO.php');

class EspecialDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Especial where " . $cond, $args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Especial($obj['id'], $obj['precio'], $obj['nombre'], PizzaDAO::get($obj['Pizza_id']));
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
            Conexion::execute("insert into Especial(producto_id,precio,nombre,Pizza_id) values(?,?,?,?)", array($obj->getId(), $obj->getPrecio(), $obj->getNombre(), $obj->getPizza()->getId()));
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
            Conexion::execute("update Especial set precio=?, Pizza_id=?, nombre = ? where id = ?", array($obj->getPrecio(), $obj->getPizza()->getId(), $obj->getNombre(), $obj->getId()));
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
            Conexion::execute("delete from Especial where id=?", array($id));
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
            $stm = Conexion::execute("SELECT * FROM Especial where id=?", array($id));

            if ($obj = $stm->fetch()) {
                return new Especial($obj['id'], $obj['precio'], $obj['nombre'], PizzaDAO::get($obj['Pizza_id']));
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
        $stm = Conexion::execute("SELECT * FROM orden_especial where Orden_id = ?", array($id));
        while ($row = $stm->fetch()) {
            $obj = self::get($row['Especial_id']);
            $obj->tamano = $row['tamano'];
            $obj->orilla = OrillaDAO::get($row['orilla_id']);
            $res[] = $obj;
        }
        return $res;
    }

}
?>