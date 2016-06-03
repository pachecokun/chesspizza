<?php

include_once(__DIR__.'/../Model/Orden.php');
include_once(__DIR__.'/DAO.php');

class OrdenDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Orden where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Orden($obj['id'],$obj['fecha_hora'],$obj['direccion'],$obj['Sucursal_id'],$obj['Repartidor_id'],$obj['lat'],$obj['lon'],$obj['nombre_cliente'],$obj['tel_cliente'],$obj['email_cliente']);
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
            Conexion::execute("insert into Orden(fecha_hora,direccion,Sucursal_id,Repartidor_id,lat,lon,nombre_cliente) values(?,?,?,?,?,?,?,?,?)",array($obj->getFechaHora(),$obj->getDireccion(),$obj->getSucursalId(),$obj->getRepartidorId(),$obj->getLat(),$obj->getLon(),$obj->getNombreCliente(),$obj->getTelCliente(),$obj->getEmailCliente()));
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
            Conexion::execute("update Orden set id=?, fecha_hora=?, direccion=?, Sucursal_id=?, Repartidor_id=?, lat=?, lon=?, nombre_cliente=?, tel_cliente=?, email_cliente=? where id = ?",array($obj->getFechaHora(),$obj->getDireccion(),$obj->getSucursalId(),$obj->getRepartidorId(),$obj->getLat(),$obj->getLon(),$obj->getNombreCliente(),$obj->getTelCliente(),$obj->getEmailCliente(),$obj->getId()));
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
            Conexion::execute("delete from Orden where id=?",array($id));
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
            $stm = Conexion::execute("SELECT * FROM Orden where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Orden($obj['id'],$obj['fecha_hora'],$obj['direccion'],$obj['Sucursal_id'],$obj['Repartidor_id'],$obj['lat'],$obj['lon'],$obj['nombre_cliente']);
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