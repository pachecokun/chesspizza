<?php
	session_start();
	require_once("../../Controller/UsuarioController.php");
	UsuarioController::logout();
?>