<?php

include_once('../BD/Conexion.php');
include_once('../Model/Sucursal.php');

class PaqueteDAO implements DAO
{
    public static function getAll()
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Paquete");

            while ($obj = $stm->fetch()) {
                $sucs[] = new Paquete($obj['Producto_id'],$obj['Refresco_Producto_id'],$obj['Especial_id'],$obj['nombre']);
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
            Conexion::execute("insert into Paquete values($,$,$,$)",array($obj->getProductoId(),$obj->getRefreascoProductoId(),$obj->getEspecialId(),$obj->getNombre()));
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
            Conexion::execute("update Paquete set Refresco_Producto_id=?, =?, Especial_id = ?, nombre = ? where Producto_id = ?",array($obj->getRefreascoProductoId(),$obj->getEspecialId(),$obj->getNombre(),$obj->getProductoId()));
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
            Conexion::execute("delete from Paquete where Producto_id=?",array($id));
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