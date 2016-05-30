<?php
require_once __DIR__ . "/../DAO/OrdenDAO.php";

class OrdenController
{
    public static function setDatosOrden($nombre, $tel, $direccion, $lat, $lon)
    {
        session_start();
        $_SESSION['nom'] = $nombre;
        $_SESSION['tel'] = $tel;
        $_SESSION['dir'] = $direccion;
        $_SESSION['lat'] = $lat;
        $_SESSION['lon'] = $lon;
    }

    public static function getDatosOrden()
    {
        session_start();
        return array(
            'nom' => $_SESSION['nom'],
            'tel' => $_SESSION['tel'],
            'dir' => $_SESSION['dir'],
            'lat' => $_SESSION['lat'],
            'lon' => $_SESSION['lon']
        );
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
