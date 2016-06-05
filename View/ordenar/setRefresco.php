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
            var srefresco = getSelectedText("refresco");
            var refresco = srefresco.substring(srefresco.indexOf('$') + 1);
            var cantidad = document.getElementById("cantidad").value;
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
    <form method="post">
        <input type='hidden' name='idRefresco' value='<?= $refresco->getId() ?>'>
        <h3>Tamaño</h3>
        <select name='refresco' id="refresco" onchange="update()">
            <option value='0'>600 ml - $<?= number_format(REFRECO_CHICO, 2) ?></option>
            <option value='1'>1.5 L - $<?= number_format(REFRECO_MEDIANO, 2) ?></option>
            <option value='2'>2.5 L - $<?= number_format(REFRECO_GRANDE, 2) ?></option>
        </select>
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