<?php

include_once '../../Controller/EspecialController.php';

$ingredientes = IngredienteController::getAll();
?>
<h1>Registro de especial</h1>
<h2>Seleccione sus ingredientes</h2>

<form>
    <?php
    foreach ($ingredientes as $ingrediente){
    ?>
        <?=$ingrediente->getNombre() ?><input type="checkbox" name="<?=$ingrediente->getId() ?>"><br>
    <?php}

    ?>
    <input type="submit">
</form>


