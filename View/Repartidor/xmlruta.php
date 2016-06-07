<?php
header('Content-type: application/xml');
require_once "../../Controller/RutasController.php";
require_once "../../Controller/RepartidorController.php";
?>
<?= '<?xml version = "1.0" encoding="utf-8"?>' ?>
<ruta>
    <?php foreach (RepartidorDAO::getRuta(RepartidorDAO::get($_GET['id'])) as $orden): ?>
        <orden id="<?= $orden->getId() ?>" lat="<?= $orden->getLat() ?>" lon="<?= $orden->getLon() ?>"
               total="<?= OrdenController::getPrecioOrden($orden) ?>" cliente="<?= $orden->getNombreCliente() ?>">
            <?php foreach ($orden->getPizzas() as $pizza): ?>
                <pizza tamano="<?= OrdenController::getSizePizza($pizza->tamano) ?>" cantidad="<?= $pizza->cantidad ?>">
                    <?php foreach ($pizza->getIngredientes() as $ingrediente): ?>
                        <ingrediente nombre="<?= $ingrediente->getNombre() ?>"/>
                    <?php endforeach; ?>
                </pizza>
            <?php endforeach; ?>
            <?php foreach ($orden->getEspeciales() as $pizza): ?>
                <especial tamano="<?= OrdenController::getSizePizza($pizza->tamano) ?>"
                          cantidad="<?= $pizza->cantidad ?>" nombre="<?= $pizza->getNombre() ?>"/>
            <?php endforeach; ?>
            <?php foreach ($orden->getPaquetes() as $paquete): ?>
                <?php $pizza = $paquete->getEspecial();
                $refresco = $paquete->getRefresco(); ?>
                <especial tamano="<?= OrdenController::getSizePizza($paquete->tamano_pizza) ?>"
                          cantidad="<?= $paquete->cantidad ?>" nombre="<?= $pizza->getNombre() ?>"/>
                <refresco cantidad="<?= $paquete->cantidad ?>" nombre="<?= $refresco->getNombre() ?>"/>
            <?php endforeach; ?>
            <?php foreach ($orden->getRefrescos() as $refresco): ?>
                <refresco cantidad="<?= $refresco->cantidad ?>" nombre="<?= $refresco->getNombre() ?>"/>
            <?php endforeach; ?>
        </orden>
    <?php endforeach; ?>
</ruta>
