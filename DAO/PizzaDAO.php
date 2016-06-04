<?php

include_once(__DIR__.'/../Model/Pizza.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/IngredienteDAO.php');

class PizzaDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Pizza where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Pizza($obj['Producto_id'], $obj['tamano'], IngredienteDAO::getIngredientesPizza($obj['Producto_id']));
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
            Conexion::execute("insert into Pizza values(?,?)",array($obj->getProductoId(),$obj->getTamano()));
            foreach ($obj->getIngredientes() as $ingrediente) {
                Conexion::execute("insert into pizza_ingrediente values(?,?)", array($obj->getProductoId(), $ingrediente->getId()));
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
            Conexion::execute("update Pizza set tamano=?, where Producto_id = ?",array($obj->getTamano(),$obj->getProductoId()));
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
            Conexion::execute("delete from Pizza where Producto_id=?",array($Producto_id));
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
            $stm = Conexion::execute("SELECT * FROM Pizza where Producto_id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Pizza($obj['Producto_id'], $obj['tamano'], IngredienteDAO::getIngredientesPizza($obj['Producto_id']));
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