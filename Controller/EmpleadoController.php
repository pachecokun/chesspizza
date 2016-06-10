<?php
include_once __DIR__ . "/../DAO/EmpleadoDAO.php";
class EmpleadoController{
	public static function getInfo(){
		return EmpleadoDAO::get($_SESSION['empleado']['id']);
	}
	
	public static function getAll(){
		return EmpleadoDAO::getAll();
	}

	public static function getAllBySucursalId($sucId){
		//return EmpleadoDAO::getEmpleadosSucursal($sucId);
		return EmpleadoDAO::getAll("Sucursal_id = ?", array($sucId));
	}
	
	public static function getAllSucursalByUserType($sucId, $userType){
		return EmpleadoDAO::getAll("Sucursal_id = ? and tipoEmpleado = ?", array($sucId, $userType));
	}

	public static function registrarEmpleadoSuc($idSuc, $user, $pass, $nom, $pat, $mat, $tel, $tipo){
		if(empty(EmpleadoDAO::getAll("username = ?", array($user))))
			return EmpleadoDAO::save(new Empleado(null, $idSuc, $user, $pass, $nom, $pat, $mat, $tel, $tipo));
		else
			return false;
	}

	public static function getTipoEmpleado($sucId, $tipo){
		return EmpleadoDAO::getTipoEmpleadosSucursal(array($sucId, $tipo));
	}
}
/*?>*/