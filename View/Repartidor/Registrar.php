<?php
include_once('../../Controller/RepartidorController.php');


if(isset($_POST['nombre'])){
    if(RepartidorController::registrar($_POST['nombre'],$_POST['tel'])){
        header('Location: /');
    }
    else{
        echo "Error al registrar repartidor";
    }
}
?>
<form method="post">
    Nombre: <input type="text" name="nombre"><br>
    Teléfono: <input type="text" name="tel"><br>
    <input type="submit">
</form>