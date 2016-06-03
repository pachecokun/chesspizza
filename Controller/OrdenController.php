<?php
require_once __DIR__ . "/../DAO/OrdenDAO.php";
require_once __DIR__ . "/../Model/Orden.php";

class OrdenController
{
    public static function setDatosOrden($nombre, $tel, $direccion,$mail, $lat, $lon,$suc)
    {
        session_start();
		if(isset($_SESSION['orden'])){
			unset($_SESSION['orden']);
			$_SESSION['orden'] = null;
		}
        $orden = new Orden();
        $orden->setDireccion($direccion);
        $orden->setNombreCliente($nombre);
        $orden->setLat($lat);
        $orden->setLon($lon);
        $orden->setTelCliente($tel);
        $orden->setEmailCliente($mail);
		$orden->setSucursalId($suc);

        $_SESSION['orden'] = $orden;
		return $orden;
    }

    public static function getDatosOrden()
    {
        session_start();
        return $_SESSION['orden'];
    }
}

if(isset($_POST['add'])){
	session_start();
	if(isset($_SESSION['orden'])){
		$n = count($_SESSION['orden']);
	}
	else{
		$_SESSION['orden'] = array();
		$n = 0;
	}
	$_SESSION['orden'][$n]['type'] = $_POST['productType'];
	$_SESSION['orden'][$n]['id']= $_POST['id'];
	$_SESSION['orden'][$n]['idSize']= $_POST['size'];
	$_SESSION['orden'][$n]['size']= "mediana";
	$_SESSION['orden'][$n]['idOrilla'] = $_POST['orilla'];
	$_SESSION['orden'][$n]['orilla'] = "rellena de queso";
	$_SESSION['orden'][$n]['idMasa'] = $_POST['masa'];
	$_SESSION['orden'][$n]['masa'] = "delgada";
	$_SESSION['orden'][$n]['cantidad'] = $_POST['cantidad'];
	$_SESSION['orden'][$n]['precio'] = 150;
	var_dump($_SESSION['orden']);
}
if(isset($_REQUEST['killOrden'])){
	unset($_SESSION['orden']);
	echo "Done";
}
?>
