<?php
$pos = ""; //fix para la ubicación relativa en las rutas.
$active = "menu";
require_once($pos . "../headerCliente.php");
?>
<!-- Head content aquí -->
<?php
require_once($pos . "../bodyCliente.php");
?>
<script>
	function algo() {
		var element = document.getElementById("resultado");
		alert(element == null);
		element.innerHTML = "<h4>Disculpe las molestias, la orden ya está siendo preparada.</h4>"
	}
</script>
<!-- Contenido va aquí-->
<h1>Cancelar orden</h1>
<h2>1. Verifica el estado de la orden</h2>
<h5>Recuerda que sólo puedes cancelar la orden si aún no ha sido metida al horno. Para verificar el estado de la orden, ingresa el número de orden:</h5>
<p><strong>Número de orden</strong></p>
<p style="color:green">La orden ha llegado satisfactoriamente a su destino.</p>
<p></p>
<p style="color:indianred">No existen registros asociados con el número de orden introducido.</p>
<p style="color:indianred">Lo sentimos, tu pizza ya está en el horno.</p>
<p style="color:indianred">Lo sentimos, el número de orden introducido no es válido.</p>
<form>
	<input type="text" placeholder="Número de orden"/>
	<button type="button" onclick="algo()">Buscar</button>
</form>
