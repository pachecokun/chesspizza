<?php
require_once("../../Controller/OrdenController.php");
$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
require_once("../../Controller/EspecialController.php");

$refresco = RefrescoDAO::get($_GET['id']);

if (isset($_POST['idRefresco'])) {
    OrdenController::addRefresco($_POST['idRefresco'], $_POST['refresco'], $_POST['cantidad']);
}
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
    <script>
        function getSelectedText(elementId) {
            var elt = document.getElementById(elementId);

            if (elt.selectedIndex == -1)
                return null;

            return elt.options[elt.selectedIndex].text;
        }
        function update() {
            var cantidad = document.getElementById("cantidad").value;
            var refresco = document.getElementById("refresco").innerHTML;
            refresco = refresco.substring(refresco.indexOf('$') + 1);
            var precio = Number(refresco) * cantidad;
            document.getElementById("precio").innerHTML = "$" + precio.toFixed(2);
        }
    </script>
<?php
require_once("../layout/body.php");
if (isset($orden)) {
    print_r($orden);
}
?>
    <h1>Preferencias de refresco</h1>
    <h2><?= $refresco->getNombre() ?></h2>
    <p id="refresco">$<?= number_format($refresco->getPrecio(), 2) ?></p>
    <form method="post">
        <input type='hidden' name='idRefresco' value='<?= $refresco->getId() ?>'>
        <h3>Cantidad</h3>
        <div class='form-group'>
            <input type='number' name='cantidad' id="cantidad" placeholder='cantidad' value="1" min="1"
                   onchange="update()" onkeyup="update()"/>
        </div>
        <p>Total <strong class='text-success' id="precio">$1000000</strong></p>
        <div class='row'>
            <div class='col-6'>
                <a href='addPaquete'>
                    <button type='button' class='btn-danger'>Cancelar</button>
                </a>
            </div>
            <div class='col-6'>
                <button type='submit' name='addPaquete' class='btn-success'>Agregar!</button>
            </div>
        </div>
        <script>update()</script>
    </form>
<?php
include_once("../layout/footer.php");
?>