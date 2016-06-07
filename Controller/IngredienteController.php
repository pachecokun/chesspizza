<?php

include_once __DIR__.'/../DAO/IngredienteDAO.php';
include_once __DIR__.'/../DAO/InvIngredienteDAO.php';

class IngredienteController{
	public static function getAllBySucursalId($sucId){
		return IngredienteDAO::getIngredientesSucursal($sucId);
	}
	
    public static function getAll(){
        return IngredienteDAO::getAll();
    }
	
	public static function get($idIng){
		return IngredienteDAO::get($idIng);
	}
	
	public static function getExistencias($idSuc, $idIng){
		$exists = InvIngredienteDAO::get(array($idSuc, $idIng));
		if(!empty($exists)){
			return $exists->getExistencias();
		}
		else{
			return 0;
		}
	}
	
	public static function registrarIngredienteSuc($idIng, $idSuc, $cantidad){
		$exists = InvIngredienteDAO::get(array($idSuc, $idIng));
		if(!empty($exists)){
			$cantidad = $cantidad + $exists->getExistencias();
			return InvIngredienteDAO::update($exists->setExistencias($cantidad));
		}
		else{
			return InvIngredienteDAO::save(new InvIngrediente($idSuc, $idIng, $cantidad));
		}
	}
	
	public static function updateCantidad($idIng, $idSuc, $cantidad){
		$exists = InvIngredienteDAO::get(array($idSuc, $idIng));
		if(!empty($exists)){
			return InvIngredienteDAO::update($exists->setExistencias($cantidad));
		}
		else{
			return InvIngredienteDAO::save(new InvIngrediente($idSuc, $idIng, $cantidad));
		}
	}

	public static function getPizza($pizza)
	{
		$res = array();
		$stm = Conexion::execute("select*from pizza_ingredeinte where Pizza_id=?", array($pizza->getId()));
		while ($row = $stm->fetch()) {
			$res[] = self::get($row['Ingrediente_id']);
		}
		return $res;
	}
}
?>