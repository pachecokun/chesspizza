<?php

include_once(__DIR__.'/../Model/Empleado.php');
include_once(__DIR__.'/DAO.php');

class EmpleadoDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Empleado where ".$cond, $args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new Empleado($obj['id'],$obj['Sucursal_id'],$obj['username'],$obj['password'],$obj['nombre'],$obj['apPaterno'],$obj['apMaterno'],$obj['telefono'],$obj['tipoEmpleado']);
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
            Conexion::execute("insert into Empleado(Sucursal_id,username,password,nombre,apPaterno,apMaterno,telefono,tipoEmpleado) values(?,?,?,?,?,?,?,?)",
					array($obj->getSucursal(),$obj->getUsername(),$obj->getPassword(),$obj->getNombre(),$obj->getApPaterno(),$obj->getApMaterno,$obj->getTelefono(),$obj->getTipoEmpleado()));
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
            Conexion::execute("update Empleado set Sucursal_id=?, username=?, password=?, nombre=?, apPaterno=?, apMaterno=?, telefono=?, tipoEmpleado=? where id = ?",
					array($obj->getSucursal(),$obj->getUsername(),$obj->getPassword(),$obj->getNombre(),$obj->getApPaterno(),$obj->getApMaterno,$obj->getTelefono(),$obj->getTipoEmpleado(),$obj->getId()));
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
            Conexion::execute("delete from Empleado where id=?",array($id));
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
            $stm = Conexion::execute("SELECT * FROM Empleado where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Repartidor($obj['id'],$obj['nombre'],$obj['tel']);
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