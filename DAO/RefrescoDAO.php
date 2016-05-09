<?php

include_once(__DIR__.'/../Model/Refresco.php');
include_once(__DIR__.'/DAO.php');

class RefrescoDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Refresco where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Refresco($obj['Producto_id'],$obj['nombre']);
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
            Conexion::execute("insert into Refresco values(?,?)",array($obj->getProductoId(),$obj->getNombre(),));
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
            Conexion::execute("update Refresco set =?, where Producto_id = ?",array($obj->getNombre(),$obj->getProductoId()));
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
            Conexion::execute("delete from Refresco where Producto_id=?",array($Producto_id));
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
            $stm = Conexion::execute("SELECT * FROM Refresco where Producto_id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Refresco($obj['Producto_id'],$obj['nombre']);
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