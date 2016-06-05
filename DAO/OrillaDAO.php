<?php

include_once(__DIR__ . '/../Model/Orilla.php');
include_once(__DIR__ . '/DAO.php');
include_once(__DIR__ . '/IngredienteDAO.php');

class OrillaDAO implements DAO
{
    public static function getAll($cond = "1=1", $args = array())
    {
        try {
            $orillas = array();
            $stm = Conexion::execute("SELECT * FROM orilla where " . $cond, $args);

            while ($obj = $stm->fetch()) {
                $orillas[] = new Orilla($obj['id'], $obj['nombre'], $obj['precioExtra']);
            }
            return $orillas;
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
            Conexion::execute("insert into orilla values(?,?,?)", array($obj->getId(), $obj->getNombre(), $obj->getPrecioExtra()));
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
            Conexion::execute("update Orilla set nombre = ?, precioExtra=? where id = ?", array($obj->getTamano(), $obj->getId()));
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
            Conexion::execute("delete from orilla where id=?", array($id));
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
            $stm = Conexion::execute("SELECT * FROM orilla where id=?", array($id));

            if ($obj = $stm->fetch()) {
                return new Orilla($obj['id'], $obj['nombre'], $obj['precioExtra']);
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