<?php
	$userSession = true;
	require_once("../layout/navs/login.php");
	require_once("../layout/header.php");
	require_once("../../Controller/UsuarioController.php");
	
	if($_SESSION['empleado']['tipoEmpleado'] == 3){
		require_once("../layout/navs/gerente.php");
	}
	else if($_SESSION['empleado']['tipoEmpleado'] == 2){
		require_once("../layout/navs/repartidor.php");
	}
	else if($_SESSION['empleado']['tipoEmpleado'] == 1){
		require_once("../layout/navs/chef.php");
	}
	else{
		$_SESSION['message'] = array("danger", "Acceso denegado");
		header("location: /");
	}
	
	if(isset($_POST['curPass']) && isset($_POST['newPass']) && isset($_POST['confPass'])){
	
		$account = UsuarioController::getEmpleado($_SESSION['empleado']['id']);
		if(empty($account)){
			$_SESSION['message'] = array("danger", "usuario no encontrado");
		}
		else if($account->getPassword() != $_POST['curPass']){
			$_SESSION['message'] = array("danger", "Contraseña incorrecta");
		}
		else{
			UsuarioController::changePassword($account, $_POST['newPass']);
			$_SESSION['message'] = array("warning", "Contraseña cambiada correctamente");
			if($_SESSION['empleado']['tipoEmpleado'] == 3){
				header("location: ../gerente");
			}
			else if($_SESSION['empleado']['tipoEmpleado'] == 2){
				header("location: ../repartidor");
			}
			else if($_SESSION['empleado']['tipoEmpleado'] == 1){
				header("location: ../chef");
			}
			else{
				$_SESSION['message'] = array("danger", "Acceso denegado");
				header("location: /");
			}
			exit();
		}
	}
?>
	<!-- Head content aquí -->
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
<?php
	$title ="Cambiar contraseña";
	require_once("../layout/body.php");
	/*if(isset($account)){
		var_dump($account);
		var_dump($account->getPassword());
		var_dump($account->getPassword() == $_POST['curPass']);
	}*/
?>
	<!-- Contenido va aquí-->
	<div id=message></div>
	<form action="../account/changePassword" method="post" id="form">
		<input type="password" name="curPass" placeholder="Contraseña actual" id="curPass" />
		<input type="password" name="newPass" placeholder="Nueva contraseña" id="newPass" />
		<input type="password" name="confPass" placeholder="Confirmar contraseña" id="confPass" />
		<button type="Button" onClick="valida()">Acceder</button>
	</form>
	<script type="text/javascript">
		function valida(){
			var msg = document.getElementById("message");
			var curPass = document.getElementById("curPass");
			var newPass = document.getElementById("newPass");
			var confPass = document.getElementById("confPass");
			if(curPass.value.length==0 ){
				curPass.focus();
				msg.innerHTML = "Ingrese la contraseña actual";
				msg.style.color= "#006699";
				return false;
			}
			if(newPass.value.length==0 ){
				newPass.focus();
				msg.innerHTML = "Ingrese la nueva contraseña";
				msg.style.color= "#006699";
				return false;
			}
			if(confPass.value.length==0 ){
				confPass.focus();
				msg.innerHTML = "Confirme la nueva contraseña";
				msg.style.color= "#006699";
				return false;
			}
			if(newPass.value != confPass.value){
				newPass.value="";
				confPass.value="";
				newPass.focus();
				msg.innerHTML = "Las contraseñas no coinciden";
				msg.style.color= "#CC0000";
				return false;
			}
			document.getElementById("form").submit();
		}
	</script>
<?php
	include_once("../layout/footer.php");
?>