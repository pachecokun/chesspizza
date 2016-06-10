<?php

include_once(__DIR__.'/../Model/Empleado.php');
include_once(__DIR__.'/../DAO/RepartidorDAO.php');
include_once(__DIR__.'/DAO.php');

class EmpleadoDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM empleado where ".$cond, $args);

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
            Conexion::execute("insert into empleado(Sucursal_id,username,password,nombre,apPaterno,apMaterno,telefono,tipoEmpleado) values(?,?,?,?,?,?,?,?)",
					array($obj->getSucursal(),$obj->getUsername(),$obj->getPassword(),$obj->getNombre(),$obj->getApPaterno(),$obj->getApMaterno(),$obj->getTelefono(),$obj->getTipoEmpleado()));
			
			if($obj->getTipoEmpleado()==2){
				$reps = self::getAll("username=? and password=?", array($obj->getUsername(), $obj->getPassword()));
				$newRep= $reps[0];
				RepartidorDAO::save(new Repartidor(0, $newRep));
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
            Conexion::execute("update empleado set Sucursal_id=?, username=?, password=?, nombre=?, apPaterno=?, apMaterno=?, telefono=?, tipoEmpleado=? where id = ?",
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
            Conexion::execute("delete from empleado where id=?",array($id));
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
            $stm = Conexion::execute("SELECT * FROM empleado where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Empleado($obj['id'],$obj['Sucursal_id'],$obj['username'],$obj['password'],$obj['nombre'],$obj['apPaterno'],$obj['apMaterno'],$obj['telefono'],$obj['tipoEmpleado']);
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

    public static function getEmpleadosSucursal($id)
    {
        $empleados = array();
        $stm2 = Conexion::execute("SELECT * FROM empleado where Sucursal_id = ?", array($id));
        while ($pi = $stm2->fetch()) {
            $empleados[] = array(
                'empleado' => self::get($pi['id'])
            );
        }
        return $empleados;
    }

}
?>