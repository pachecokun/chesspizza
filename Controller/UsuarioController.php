<?php
	require_once __DIR__ . "/../DAO/EmpleadoDAO.php";
	class UsuarioController{
		public static function login($usr, $psw){
			$emp = EmpleadoDAO::getAll("username=? and password=?",array($usr, $psw));
			if(!empty($emp))
				$_SESSION['empleado'] = array();
		}
		
		public static function logout(){
			if(isset($_SESSION['empleado'])){
				unset($_SESSION['empleado']);
			}
		}
	}
	/*session_start();
	include_once("../DAO/SucursalDAO.php");
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	if(empty($user) || empty($pass)){
		$_SESSION['AUTH_ERR'] = true;
		header("location: ../View/principal/login/");
	}
	$sucDAO = new SucursalDAO();
	$reg = $sucDAO->get($user);
	if(empty($reg)){
		$_SESSION['AUTH_ERR'] = true;
		header("location: ../View/principal/login/");
	}
	else if($reg->getPassword() != $pass){
		$_SESSION['AUTH_ERR'] = true;
		header("location: ../View/principal/login/");
	}
	else{
		$_SESSION['idSuc'] = $reg->getId();
		header("location:../View/principal/login/");
	}*/
?>