<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo 'hola';

include_once('../DAO/SucursalesDAO.php');

$sucs = SucursalesDAO::getAll();
echo 'equisde';
echo '<pre>';
print_r($sucs);
echo '</pre>';

?>