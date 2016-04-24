<?php

echo 'hola';

include_once('../DAO/SucursalesDAO.php');

$sucs = SucursalesDAO::getAll();
echo 'equisde';
echo '<pre>';
while($suc = $sucs->fetch()){
    print_r($suc);
}
echo '</pre>';

?>