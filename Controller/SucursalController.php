<?php

echo 'hola';

include_once('../DAO/SucursalesDAO.php');

$sucs = SucursalesDAO::getAll();
echo 'equisde';
echo '<pre>';
print_r($sucs);
echo '</pre>';

?>