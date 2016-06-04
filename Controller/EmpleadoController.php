<?php
	require_once __DIR__ . "/../DAO/EmpleadoDAO.php";
	class EmpleadoController{
		public static function getInfo(){
			return EmpleadoDAO::getAll("id=?", array($_SESSION['empleado']['id']));
		}
	}
?>