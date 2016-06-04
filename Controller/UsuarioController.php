<?php
	require_once __DIR__ . "/../DAO/EmpleadoDAO.php";
	require_once __DIR__ . "/../DAO/SucursalDAO.php";
	class UsuarioController{
		public static function login($usr, $psw){
			$emp = EmpleadoDAO::getAll("username=? and password=?",array($usr, $psw));
			if(!empty($emp) && count($emp) == 1){
				$suc = SucursalDAO::getAll("id=?", array($emp[0]->getSucursal()));
				$_SESSION['empleado'] = array();
				$_SESSION['empleado']['id'] = $emp[0]->getId();
				$_SESSION['empleado']['sucursal'] = $emp[0]->getSucursal();
				$_SESSION['empleado']['nomSucursal'] = $suc[0]->getNombre();
				$_SESSION['empleado']['nombre'] = $emp[0]->getNombre();
				$_SESSION['empleado']['apellido'] = $emp[0]->getApPaterno();
				$_SESSION['empleado']['tipoEmpleado'] = $emp[0]->getTipoEmpleado();
			}
		}
		
		public static function logout(){
			if(isset($_SESSION['empleado'])){
				unset($_SESSION['empleado']);
				header("location:/");
			}
		}
	}
?>