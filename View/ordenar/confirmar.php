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
    <!-- Contenido va aquí-->
    <h1>Orden confirmada</h1>
    <h2>Clave de orden: <?= $orden->getId() ?></h2>
    <p>Su orden ha sido confirmada correctamente. El tiempo de llegada estimado para la orden es de 15 minutos.</p>
    <p>La información del pedido ha sido enviada al correo electrónico '<?= $orden->getEmailCliente() ?>' .</p>
    <p>Puede rastrear su orden utilizando su clave de orden desde <a href="/ordenar/rastear">aquí</a></p>
    <a href="/">Regresar a inicio</a>
<?php
include_once("../layout/footer.php");
?>