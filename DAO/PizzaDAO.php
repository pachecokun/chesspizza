<?php

include_once(__DIR__.'/../Model/Pizza.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/IngredienteDAO.php');
include_once(__DIR__ . '/OrillaDAO.php');

class PizzaDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Pizza where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Pizza($obj['id'], IngredienteDAO::getIngredientesPizza($obj['id']));
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
            Conexion::execute("insert into Pizza values(?)", array($obj->getId()));
            foreach ($obj->getIngredientes() as $ingrediente) {
                Conexion::execute("insert into pizza_ingrediente values(?,?)", array($obj->getId(), $ingrediente->getId()));
            }
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
            Conexion::execute("update Pizza set tamano=?, where id = ?", array($obj->getTamano(), $obj->getId()));
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
            Conexion::execute("delete from Pizza where id=?", array($id));
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
            $stm = Conexion::execute("SELECT * FROM Pizza where id=?", array($id));

            if ($obj = $stm->fetch()) {
                return new Pizza($obj['id'], IngredienteDAO::getIngredientesPizza($obj['id']));
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
        $stm = Conexion::execute("SELECT * FROM orden_pizza where Orden_id = ?", array($id));
        while ($row = $stm->fetch()) {
            $obj = self::get($row['Pizza_id']);
            $obj->tamano = $row['tamano'];
            $obj->orilla = OrillaDAO::get($row['orilla_id']);
            $res[] = $obj;
        }
        return $res;
    }

}
?>