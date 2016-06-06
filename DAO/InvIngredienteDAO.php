<?php
include_once(__DIR__.'/../Model/InvIngrediente.php');
include_once(__DIR__.'/DAO.php');

class InvIngredienteDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM inv_ingrediente where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $sucs[] = new InvIngrediente($obj['Sucursal_id'],$obj['Ingrediente_id'],$obj['existencias']);
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
            Conexion::execute("insert into inv_ingrediente(Sucursal_id, Ingrediente_id ,existencias) values(?,?,?)",
						array(
								$obj->getSucursal(),
								$obj->getIngrediente(),
								$obj->getExistencias()
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
            Conexion::execute("update inv_ingrediente set existencias=? where Sucursal_id=? and Ingrediente_id=?",
						array(
								$obj->getExistencias(),
								$obj->getSucursal(),
								$obj->getIngrediente()
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
		$key[1] idIng
	***/
    public static function delete($key)
    {
        try {
            Conexion::execute("delete from inv_ingrediente where Sucursal_id=? and Ingrediente_id=?",$key);
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
            $stm = Conexion::execute("SELECT * FROM inv_ingrediente where Sucursal_id=? and Ingrediente_id=?",$key);

            if ($obj = $stm->fetch()) {
                return new InvIngrediente($obj['Sucursal_id'],$obj['Ingrediente_id'],$obj['existencias']);
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