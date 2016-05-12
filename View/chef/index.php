<?php
$pos = ""; //fix para la ubicación relativa en las rutas.
$active = "inicio";
$navElements = array(
    "inicio" => array("CONSULTAR ÓRDENES", "menu", ""),
    "sucursales" => array("SUCURSALES", "sucursales", ""),
    "inicio_sesion" => array("CERRAR SESIÓN", "iniciar_sesion", "")
);
require_once("../htmlhead.php");
?>
    <title><?php echo $title; ?>Órdenes</title>
    <!-- <head> content aquí -->
    <style>
        .orden {
            background-color: #d4d4d4;
            border-radius: 30px;
            padding: 20px;
            margin-bottom: 50px;
        }

        .orden ul li ul li {
            font-size: 1.3em;
        }

        .lista {
            text-align: right;
        }
    </style>
<?php
require_once($pos . "../body.php");
?>
    <h1>Lista de órdenes</h1>
    <div class="orden">
        <h2>Orden 1024 - 15:37</h2>
        <ul>
            <li>
                <h3>1 Pizza personalizada (Grande)</h3>
                <ul>
                    <li>Orilla rellena de queso</li>
                    <li>Champiñones</li>
                    <li>Pepperoni</li>
                </ul>
            </li>
            <li>
                <h3>1 Hawaiiana (Grande)</h3>
                <ul>
                    <li>Jamón</li>
                    <li>Piña</li>
                </ul>
            </li>
        </ul>
        <div class="lista">
            <button>Orden lista</button>
        </div>
    </div>
    <div class="orden">
        <h2>Orden 1032 - 16:02</h2>
        <ul>
            <li>
                <h3>2 Mexicana (Mediana)</h3>
                <ul>
                    <li>Jalapeño</li>
                    <li>Chorizo</li>
                    <li>Cebolla</li>
                </ul>
            </li>
        </ul>
        <div class="lista">
            <button>Orden lista</button>
        </div>
    </div>
<?php
include_once($pos . "../footer.php");
?>