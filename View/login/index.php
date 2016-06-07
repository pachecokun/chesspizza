<?php
	require_once("../layout/navs/login.php");
	require_once("../layout/header.php");
	require_once("../../Controller/UsuarioController.php");
	
	if(isset($_POST['user']) && isset($_POST['pass'])){
		UsuarioController::login($_POST['user'], $_POST['pass']);
		if(!isset($_SESSION['empleado'])){
			$_SESSION['message'] = array("danger", "Usuario o contraseña incorrectos");
		}
		else{
			if($_SESSION['empleado']['tipoEmpleado'] == 3){
				header("location: ../gerente");
			}
			else if($_SESSION['empleado']['tipoEmpleado'] == 2){
				header("location: ../Repartidor");
			}
			else if($_SESSION['empleado']['tipoEmpleado'] == 1){
				header("location: ../chef");
			}
			else{
				$_SESSION['message'] = array("danger", "Acceso denegado");
				header("location: /");
			}
		}
	}
?>
	<!-- Head content aquí -->
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
<?php
	require_once("../layout/body.php");
?>
	<!-- Contenido va aquí-->
	<h1>Iniciar sesión</h1>
	<div id=message></div>
	<form action="../login" method="post" id="form">
		<input type="text" name="user" placeholder="Nombre de usuario" id="user" autocomplete="off"/>
		<input type="password" name="pass" placeholder="Contraseña" id="pass" />
		<button type="Button" onClick="valida()">Acceder</button>
	</form>
	<script type="text/javascript">
		function valida(){
			var msg = document.getElementById("message");
			var user = document.getElementById("user");
			var pass = document.getElementById("pass");
			if(user.value.length==0 ){
				user.focus();
				msg.innerHTML = "Ingrese el usuario";
				msg.style.color= "#006699";
				return false;
			}
			else if(pass.value.length==0){
				pass.focus();
				msg.innerHTML = "Ingrese la contraseña";
				msg.style.color = "#006699";
				return false;
			}
			document.getElementById("form").submit();
		}
	</script>
<?php
	include_once("../layout/footer.php");
?>