<?php
require_once "../../Controller/OrdenController.php";
require_once "../../Controller/RepartidorController.php";

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
<?php
include_once("../layout/footer.php");
?>
