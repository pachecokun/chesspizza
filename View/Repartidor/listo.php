<?php
require_once "../../Controller/RepartidorController.php";
$repartidor = RepartidorDAO::get($_GET['id']);
$repartidor->setStatus(0);
RepartidorDAO::update($repartidor);
header('Location: /Repartidor');