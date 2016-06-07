<?php
$pos = ""; //fix para la ubicación relativa en las rutas.
$active = "inicio";
$userSession = 1;
$navElements = array(
    "inicio" => array("CONSULTAR ÓRDENES", "menu", ""),
);
include_once($pos . "../layout/header.php");
require_once($pos . "../../Controller/ChefController.php");
?>


    <title><?php echo $title; ?>Órdenes</title>
    <script>
        window.setTimeout(function () {
            location.reload();
        }, 30 * 1000);
    </script>
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
include_once($pos . "../layout/body.php");
?>


<?php
$ordenes = ChefController::getOrdenesDeSucursal($_SESSION['empleado']['sucursal']);
if (count($ordenes) == 0 || $ordenes == null) {
    echo("<h3>No hay ordenes disponibles</h3>");
} else {
    foreach ($ordenes as $orden) {
        echo(" <div class=\"orden\">");
        echo("<h2>Orden " . $orden->getId() . " - Fecha y hora: " . $orden->getFechaHora() . "</h2>");
        echo("<table class=\"opizza\">");
        foreach ($orden->getPizzas() as $pizza) {
            print_r($pizza);
            echo("<tr><th colspan=\"3\">1 Pizza personalizada (" . $pizza->getTamano() . ")</th></tr>");
            echo("<tr><td colspan=\"3\">" . $pizza->orilla . ")</td></tr>");
            foreach ($pizza->getIngredientes() as $ingrediente) {
                echo("<tr><td>" . $ingrediente->getNombre() . "</td></tr>");
            }
        }
        echo("</table>");

        echo("<table class=\"opizza\">");
        foreach ($orden->getEspeciales() as $especial) {
            echo("<tr><th colspan=\"3\">" . $especial->getNombre() . "</th></tr>");
            foreach ($especial->getPizza()->getIngredientes() as $ingrediente) {
                echo("<tr><td colspan=\"3\">" . $ingrediente->getNombre() . "</td></tr>");
            }
        }
        echo("</table>");
        echo("<table class=\"opizza\">");
        foreach ($orden->getPaquetes() as $paquete) {
            $especial = $paquete->getEspecial();
            echo("<tr><th colspan=\"3\">" . $especial->getNombre() . "</th></tr>");
            foreach ($especial->getPizza()->getIngredientes() as $ingrediente) {
                echo("<tr><td colspan=\"3\">" . $ingrediente->getNombre() . "</td></tr>");
            }

        }
        echo("</table>");

        echo("<table class=\"opizza\">");
        foreach ($orden->getRefrescos() as $refresco) {
            echo("<tr><td colspan=\"3\">Refresco  " . $refresco->getNombre() . "</td></tr>");
        }
        echo("</table>");
        echo("<div class=\"lista\">");
        $operacion = $orden->getUltimaOperacion();
        $status = $operacion->getStatus()->getId();
        if ($status == STATUS_CONFIRMADA) {
            echo("<form action='/chef/ingresarHorno' method='POST'>");
            echo("<input type='hidden' name='idOrden' value='" . $orden->getId() . "'/>");
            echo("<input type='submit' value='Meter al horno'/>");
            echo("</form>");
        } else if ($status == STATUS_HORNO) {
            echo("<form action='/chef/ordenLista' method='POST'>");
            echo("<input type='hidden' name='idOrden' value='" . $orden->getId() . "'/>");
            echo("<input type='submit' value='Orden lista'/>");
            echo("</form>");
        } else {
            echo($status);
        }

        echo("</div>");
        echo("</div>");
    }
}

?>
    <!--div class="orden">
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
        
    </div -->


    <!--div class="orden">
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
    </div-->
<?php
include_once($pos . "../layout/footer.php");
?>