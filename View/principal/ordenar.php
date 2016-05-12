<?php
$pos = ""; //fix para la ubicación relativa en las rutas.
$active = "ordenar";
$navElements = array(
    "inicio" => array("INICIO", "menu", ""),
    "ordenar" => array("ORDENAR", "menu", ""),
    "consulta_orden" => array("CONSULTAR ORDEN", "sucursales", ""),
    "sucursales" => array("SUCURSALES", "sucursales", ""),
    "inicio_sesion" => array("INICIAR SESIÓN", "iniciar_sesion", "")
);
require_once("../htmlhead.php");
?>
    <title><?php echo $title; ?>Ordenar</title>
    <!-- <head> content aquí -->
<?php
require_once($pos."../body.php");
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
      <img src="../img/ordena-default.png" style="margin-top: 20px; width: 40%;" alt="" />
    </center>
  </div>
</div>
<div>
<?php
include_once($pos."../footer.php");
?>
