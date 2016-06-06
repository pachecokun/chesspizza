<?php
require_once "../../Controller/OrdenController.php";

$orden = OrdenController::confirmarOrden();
OrdenController::limpiarSesion();
$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
    <style>
        .container ul {
            list-style-type: none;
        }

        .container ul li {
            font-size: 20px;
        }
    </style>
<?php
require_once("../layout/body.php");
?>
<?php
if(!empty($_POST['dir']) AND !empty($_POST['nom']) AND !empty($_POST['tel']) AND !empty($_POST['email'])){
    $time = time();

    $to = "$_POST[email]";

    $header = "From: Chess Pizzas <no-reply@pizza.escom.xyz> \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/html; charset=UTF-8";

    $header .= "Content-Type: text/plain";

    $tema = "Confirmación de orden";

    $mensaje="
    <div style='border-radius: 10px; background-color: #F2F2F2; padding: 25px;'>
      <img src='http://services.escom.xyz/media/logo-nav.png' alt='Chess Pizza Logo' width='75%' style='margin-bottom: 25px;'>
      <table border='0' cellspacing='2' cellpadding='2'>
        <tr>
          <td width='20%' align='center' bgcolor='#FFFFCC'><strong>No. Orden:</strong></td>
          <td width='80%' align='left' style='font-size: 12px;'>" . $orden->getId() . "</td>
        </tr>
        <tr>
         <td width='20%' align='center' bgcolor='#FFFFCC'><strong>A nombre de:</strong></td>
         <td width='80%' align='left' style='font-size: 12px;'>$_POST[nom]</td>
       </tr>
       <tr>
        <td width='20%' align='center' bgcolor='#FFFFCC'><strong>Dirección:</strong></td>
        <td width='80%' align='left' style='font-size: 12px;'>$_POST[dir]</td>
      </tr>
       <tr>
         <td align='center' bgcolor='#FFFFCC'><strong>Email:</strong></td>
         <td width='80%' align='left' style='font-size: 12px;'>$_POST[email]</td>
       </tr>
      <tr>
        <td align='center' bgcolor='#FFFFCC'><strong>Teléfono:</strong></td>
        <td width='80%' align='left' style='font-size: 12px;'>$_POST[tel]</td>
      </tr>
      <tr>
       <td align='right' bgcolor='#FFFFFF'><strong>Total:</strong></td>
       <td align='left'>$ $_POST[tot]</td>
      </tr>
      </table>
      <p>El tiempo estimado de entrega es de MÁXIMO 45 minutos a partir de la siguiente hora: <strong>" . date("H:i", $time-3600) . "</strong></p>
    </div>
    ";

    if(mail($to,utf8_decode($tema),utf8_decode($mensaje),$header)){
      echo "<script>alert('Correo enviado satisfactoriamente a ". $to ."')</script>";
    }else{
      echo "<script>alert('Error en el envio del mail')</script>";
    }
}
?>
    <!-- Contenido va aquí-->
    <h1>Orden confirmada</h1>
    <h2>Clave de orden: <?= $orden->getId() ?></h2>
<h2>Importe: <?= OrdenController::getPrecioOrden($orden) ?></h2>
    <p>Su orden ha sido confirmada correctamente. El tiempo de llegada estimado para la orden es de 15 minutos.</p>
    <p>La información del pedido ha sido enviada al correo electrónico '<?= $orden->getEmailCliente() ?>' .</p>
    <p><strong>NOTA:</strong> Recuerda que si no encuentras el correo en la bandeja de entrada, deberias revisas la carpeta de SPAM</p>
    <p>Puede rastrear su orden utilizando su clave de orden desde <a href="/ordenar/rastear">aquí</a></p>
    <a href="/">Regresar a inicio</a>
<?php
include_once("../layout/footer.php");
?>
