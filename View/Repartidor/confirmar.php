<?php
require_once "../../Controller/OrdenController.php";
OrdenController::confirmarRecepcion($_GET['id']);
header('Location: /Repartidor?id=' . $_GET['rep']);