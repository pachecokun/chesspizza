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
		return EmpleadoDAO::getEmpleadosSucursal($sucId);
	}

	public static function registrarEmpleadoSuc($idEmp, $idSuc, $user, $pass, $nom, $pat, $mat, $tel, $tipo){
		$exists = EmpleadoDAO::get(array($idEmp, $idSuc));
		return EmpleadoDAO::save(new Empleado($idEmp, $idSuc, $user, $pass, $nom, $pat, $mat, $tel, $tipo));
	}

	public static function getTipoEmpleado($sucId, $tipo){
		return EmpleadoDAO::getTipoEmpleadosSucursal(array($sucId, $tipo));
	}
}
/*?>*/