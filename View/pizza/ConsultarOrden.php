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
<!--h1>Consulte el estado de su orden</h1>
<h2>Introduzca el número de su orden.</h2>
<p><strong>Número de orden</strong></p>
<!--p style="color:indianred">No existen registros asociados con el número de orden introducido.</p>
<p style="color:indianred">Lo sentimos, el número de orden es requerido para la consulta.</p>
<p style="color:indianred">Lo sentimos, el número de orden introducido no es válido.</p>
<form>
    <input type="text" placeholder="Número de orden"/>
    <button type="button" onclick="algo()">Buscar</button>
</form-->
<h1>Orden # [Número de orden]</h1>

<h3 style="text-align: center">Lo sentimos</h3>
<p style="text-align: center">Su orden ha sido procesada y ya no puede ser cancelada</p>
<button style="text-align: center" type="button">Seguir comprando</button>

<br><br>
<p>Estado: [Estado de la orden]</p>
<p>Fecha y hora de pedido: [Fecha y hora de la realización de la orden]</p>
<p>Fecha y hora estimada de llegada: [Tiempo máximo de llegada de la orden]</p>
<h4>Detalles de la orden</h4>
<table>
    <tr>
        <th>Producto</th>
        <th>Precio unitario</th>
        <th>Cantidad</th>
        <th>Precio por producto</th>
    </tr>
    <tr>
        <td>Pizza Hawaiiana doble queso</td>
        <td>$120</td>
        <td>2</td>
        <td>$240</td>
    </tr>
    <tr>
        <td>Pizza personalizada (Peperonni, queso, champiñones)</td>
        <td>$90</td>
        <td>1</td>
        <td>$90</td>
    </tr>
    <tr>
        <td>Coca-cola 1/2 litro </td>
        <td>$20</td>
        <td>2</td>
        <td>$20</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th>Total: $350</th>
    </tr>
</table>
<br><br>
   <button type="button">Sí</button>
<button type="button">Cancelar</button>
<button type="button" style="display:inline">Cancelar orden</button><h6 style="display: inline;">*La cancelación de la orden sólo se puede realizar si el estado del pedido se encuentra en espera de ser procesada. </h6>

