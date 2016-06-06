<?php
include_once(__DIR__.'/../Model/InvRefresco.php');
include_once(__DIR__.'/DAO.php');

class InvRefrescoDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM inv_refresco where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new InvRefresco($obj['Sucursal_id'],$obj['Refresco_id'],$obj['cantidad']);
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
            Conexion::execute("insert into inv_refresco(Sucursal_id, Refresco_id, cantidad) values(?,?,?)",
						array(
								$obj->getSucursal(),
								$obj->getRefresco(),
								$obj->getCantidad()
						)
					);
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
            Conexion::execute("update inv_refresco set cantidad=? where Sucursal_id=? and Refresco_id=?",
						array(
								$obj->getCantidad(),
								$obj->getSucursal(),
								$obj->getRefresco()
							)
					);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }

	/***
		array() $key
		$key[0] idSuc
		$key[1] idRef
	***/
    public static function delete($key)
    {
        try {
            Conexion::execute("delete from inv_refresco where Sucursal_id=? and Refresco_id=?",$key);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }


	/***
		array() $key
		$key[0] idSuc
		$key[1] idIng
	***/
    public static function get($key)
    {
        try {
            $stm = Conexion::execute("SELECT * FROM inv_refresco where Sucursal_id=? and Refresco_id=?",$key);

            if ($obj = $stm->fetch()) {
                return new InvRefresco($obj['Sucursal_id'],$obj['Refresco_id'],$obj['cantidad']);
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