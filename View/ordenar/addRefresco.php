<?php
$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
require_once("../../Controller/OrdenController.php");
$refrescos = RefrescoDAO::getAll();
?>
    <!-- <head> content aquí -->
    <style>
        .paquete {
            width: 100%;
        }

        .paquete button {
            margin: 0;
            width: 100%;
        }

        .elements {
            width: 100%;
            height: 150px;
            overflow-y: auto;
        }

        .elements > ul > li {
            font-size: 22px;
        }

        p {
            font-size: 32px;
        }

        p.precio {
            text-align: center;
            font-size: 28px;
            display: block;
        }
    </style>
<?php
require_once("../layout/body.php");
?>

    <!-- Contenido va aquí-->
    <h1>Escoge un refresco</h1>
    <div class='row'>
        <?php foreach ($refrescos as $refresco): ?>
            <?= $refresco->getNombre() ?>

            <a href='setRefresco?id=<?= $refresco->getId() ?>'>
                <button class='btn-success'>Elegir</button>
            </a>
        <?php endforeach; ?>
    </div>
<?php
include_once("../layout/footer.php");
?>