<?php
include_once(__DIR__.'/../Model/Ingrediente.php');
include_once(__DIR__.'/DAO.php');

class IngredienteDAO implements DAO
{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Ingrediente");

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
            Conexion::execute("insert into Ingrediente values($,$,$)",array($obj->getId(),$obj->getNombre(),$obj->getPrecio(),));
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
            Conexion::execute("update Ingrediente set nombre=?, nombre=? where id = ?",array($obj->getNombre(),$obj->getPrecio(),$obj->getId(),));
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

}
?>