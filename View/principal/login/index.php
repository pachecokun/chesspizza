<?php
	$pos ="../"; //fix para la ubicación relativa en las rutas.
	$active = "login";
	require_once($pos."../headerCliente.php");
?>
	<!-- Head content aquí -->
	<link rel="stylesheet" type="text/css" href="../../css/login.css" />
<?php
	require_once($pos."../bodyCliente.php");
?>
	<!-- Contenido va aquí-->
	<h1>Iniciar sesión</h1>
	<?php
		if(isset($_SESSION['ERROR'])){
			echo "<span id='message' style='color: #cc0000'>Usuario o contraseña incorrectos</span>";
			unset($_SESSION['AUTH_ERR']);
		}
		else{
			echo "<span id='message'></span>";
		}
	?>
	
	<form action="response.php" method="post" id="form">
		<input type="text" name="user" placeholder="Nombre de usuario" id="user"/>
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
			}
			else if(pass.value.length==0){
				pass.focus();
				msg.innerHTML = "Ingrese la contraseña";
				msg.style.color = "#006699";
			}
		}
	</script>
<?php
	include_once($pos."../footer.php");
?>