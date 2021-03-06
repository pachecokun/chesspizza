<?php
include_once(__DIR__.'/../Model/Ingrediente.php');
include_once(__DIR__.'/DAO.php');

class IngredienteDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Ingrediente where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Ingrediente($obj['id'],$obj['nombre'],$obj['precio']);
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
            Conexion::execute("insert into Ingrediente(nombre,precio) values(?,?)",array($obj->getNombre(),$obj->getPrecio()));
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
            Conexion::execute("update Ingrediente set nombre=?, nombre=? where id = ?",array($obj->getNombre(),$obj->getPrecio(),$obj->getId()));
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
            Conexion::execute("delete from Ingrediente where id=?",array($id));
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
            $stm = Conexion::execute("SELECT * FROM Ingrediente where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Ingrediente($obj['id'],$obj['nombre'],$obj['precio']);
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

    public static function getIngredientesPizza($id)
    {
        $ingredientes = array();
        $stm2 = Conexion::execute("SELECT * FROM pizza_ingrediente where Pizza_id = ?", array($id));
        while ($pi = $stm2->fetch()) {
            $ingredientes[] = self::get($pi['Ingrediente_id']);
        }
        return $ingredientes;
    }

    public static function getIngredientesSucursal($id)
    {
        $ingredientes = array();
        $stm2 = Conexion::execute("SELECT * FROM inv_ingrediente where Sucursal_id = ?", array($id));
        while ($pi = $stm2->fetch()) {
            $ingredientes[] = array(
				'ingrediente' => self::get($pi['Ingrediente_id']),
				'existencias' => $pi['existencias']
			);
        }
        return $ingredientes;
    }
}
?>