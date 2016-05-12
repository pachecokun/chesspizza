<?php
$pos = "../";
$active = "ordenar";
require_once($pos."../headerCliente.php");
?>
    <!-- <head> content aquí -->
	<link rel="stylesheet" type="text/css" href="../../css/ordenar.css" />
<?php
require_once($pos."../bodyCliente.php");
?>
</div>
<div class="container-fluid">
  <div class="colB">
    <img src="http://www.denisbecaud.net/cartes/cartrome.jpg" alt="Mapa" class="mapa"/>
  </div>
  <div class="colS">
    <h2 class="headers">Ordena tu Pizza</h2>
    <p>Seleccione su sucursal del mapa</p>
    <input class="formulario" type="text" name="Dirección" value="Una calle #123" disabled>
    <center>
      <input class="btn" type="submit" value="Seleccionar un paquete">
      <input class="btn" type="submit" value="Armar tu paquete">
      <img src="../../img/ordena-default.png" style="margin-top: 20px; width: 40%;" alt="" />
    </center>
  </div>
</div>
<div>
<?php
include_once($pos."../footer.php");
?>
