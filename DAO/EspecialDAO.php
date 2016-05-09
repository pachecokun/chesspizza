<?php

include_once(__DIR__.'/../Model/Especial.php');
include_once(__DIR__.'/DAO.php');

class EspecialDAO implements DAO
{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Especial");

            while ($obj = $stm->fetch()) {
                $sucs[] = new Especial($obj['id'],$obj['precio'],$obj['Pizza_id'],$obj['nombre']);
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
            Conexion::execute("insert into Especial values($,$,$)",array($obj->getId(),$obj->getPrecio(),$obj->getPizzaId(),$obj->getNombre()));
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
            Conexion::execute("update Especial set precio=?, Pizza_id=? where id = ?",array($obj->getPrecio(),$obj->getPizzaId(),$obj->getNombre(),$obj->getId()));
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
            Conexion::execute("delete from where id=?",array($id));
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