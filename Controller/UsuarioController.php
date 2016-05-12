<?php
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
	}
?>