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

        .opizza {
            margin-bottom: 50px;
            width: 80%;
            border: 4px solid black;
        }

        .opizza td {
            border-left: 4px solid black;
            border-right: 4px solid black;
        }
    </style>
<?php
require_once($pos . "../body.php");
?>
    <h1>Lista de órdenes</h1>
    <div class="orden">
        <h2>Orden 1024 - 15:37</h2>
        <table class="opizza">
            <tr>
                <th colspan="3">1 Pizza personalizada (Grande)</th>
            </tr>
            <tr>
                <td>Orilla rellena de queso</td>
            </tr>
            <tr>
                <td>Champiñones</td>
            </tr>
            <tr>
                <td>Pepperoni</td>
            </tr>
        </table>
        <table class="opizza">
            <tr>
                <th colspan="3">1 Pizza hawaiiana (Grande)</th>
            </tr>
            <tr>
                <td>Jamón</td>
            </tr>
            <tr>
                <td>Piña</td>
            </tr>
        </table>
        <div class="lista">
            <button>Orden lista</button>
        </div>
    </div>
    <div class="orden">
        <h2>Orden 1032 - 16:02</h2>
        <table class="opizza">
            <tr>
                <th colspan="3">2 Pizzas mexicanas (Jumbo)</th>
            </tr>
            <tr>
                <td>Cebolla</td>
            </tr>
            <tr>
                <td>Chorizo</td>
            </tr>
            <tr>
                <td>Jalapeño</td>
            </tr>
        </table>
        <div class="lista">
            <button>Orden lista</button>
        </div>
    </div>
<?php
include_once($pos . "../footer.php");
?>