<?php
include_once('../../Controller/RepartidorController.php');

if(isset($_POST['nombre'])){
    if(RepartidorController::registrar($nombre,$tel)){
        header('Location: /');
    }
}
else{
?>
<form method="post">
    Nombre: <input type="text"><br>
    Teléfono: <input type="text"><br>
    <input type="submit">
</form>

<?php } ?>