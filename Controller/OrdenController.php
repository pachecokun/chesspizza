<?php
require_once __DIR__ . "/../DAO/OrdenDAO.php";
require_once __DIR__ . "/../DAO/PizzaDAO.php";
require_once __DIR__ . "/../DAO/PaqueteDAO.php";
require_once __DIR__ . "/../DAO/EspecialDAO.php";
require_once __DIR__ . "/../DAO/OrillaDAO.php";
require_once __DIR__ . "/../Model/Orden.php";
require_once __DIR__ . "/EspecialController.php";



class OrdenController
{
	public static function limpiarSesion()
	{
		session_destroy();
	}

	public static function setOrdenSesion($orden)
	{
		session_start();
		if (isset($_SESSION['orden'])) {
			unset($_SESSION['orden']);
			$_SESSION['orden'] = null;
		}
		$_SESSION['orden'] = $orden;
	}

	public static function setDatosOrden($nombre, $tel, $direccion, $mail, $lat, $lon, $suc)
	{
		$orden = new Orden();
		$orden->setDireccion($direccion);
		$orden->setNombreCliente($nombre);
		$orden->setLat($lat);
		$orden->setLon($lon);
		$orden->setTelCliente($tel);
		$orden->setEmailCliente($mail);
		$orden->setSucursalId($suc);

		self::setOrdenSesion($orden);

		return $orden;
	}

	public static function getOrdenSesion()
	{
		session_start();
		if (isset($_SESSION['orden'])) {
			return $_SESSION['orden'];
		} else {
			return null;
		}
	}

	public static function getPaquetes()
	{
		return PaqueteDAO::getAll();
	}

	public static function getEspeciales()
	{
		return EspecialDAO::getAll();
	}

	public static function addPizza($idpizza, $idorilla, $tamano, $cant)
	{
		$orden = self::getOrdenSesion();
		$orden->addPizza(EspecialDAO::get($idpizza), OrillaDAO::get($idorilla), $tamano, $cant);
		self::setOrdenSesion($orden);
		header('Location: /ordenar/myOrderList');
	}

	public static function addPaquete($idpaquete, $idorilla, $spizza, $srefresco, $cant)
	{
		$orden = self::getOrdenSesion();
		$orden->addPaquete(PaqueteDAO::get($idpaquete), OrillaDAO::get($idorilla), $spizza, $srefresco, $cant);
		self::setOrdenSesion($orden);
		header('Location: /ordenar/myOrderList');
	}

	public static function addEspecial($idespecial, $idorilla, $tamano, $cant)
	{
		$orden = self::getOrdenSesion();
		$orden->addEspecial(EspecialDAO::get($idespecial), OrillaDAO::get($idorilla), $tamano, $cant);
		self::setOrdenSesion($orden);
		header('Location: /ordenar/myOrderList');
	}

	public static function addRefresco($idrefresco, $tamano, $cant)
	{
		$orden = self::getOrdenSesion();
		$orden->addRefresco(RefrescoDAO::get($idrefresco), $tamano, $cant);
		self::setOrdenSesion($orden);
		header('Location: /ordenar/myOrderList');
	}

	public static function getPrecioPaquete($paquete, $cantidad = 1)
	{
		$precio = $paquete->getPrecio();
		$precioEsp = EspecialController::getPrecio($paquete->getEspecial());
		$precio += $precioEsp * ($paquete->tamano_pizza == 0 ? 0 : ($paquete->tamano_pizza == 1 ? 0.3 : 0.5));
		$precio += $paquete->orilla->getPrecioExtra();
		return $precio * $cantidad;
	}

	public static function getPrecioEspecial($especial, $cantidad = 1)
	{
		$precio = EspecialController::getPrecio($especial);
		$precio = $precio * ($especial->tamano == 0 ? 1 : ($especial->tamano == 1 ? 1.3 : 1.5));
		$precio += $especial->orilla->getPrecioExtra();
		return $precio * $cantidad;
	}

	public static function getPrecioRefresco($refresco, $cantidad = 1)
	{
		$precio = $refresco->getPrecio();
		return $precio * $cantidad;
	}

	public static function getSizePizza($tamano)
	{
		return $tamano == 0 ? "chica" : ($tamano == 1 ? "mediana" : "grande");
	}

	public static function getSizeRefresco($tamano)
	{
		return $tamano == 0 ? "600 ml." : ($tamano == 1 ? "1.5 L" : "2.5 L");
	}

	public static function confirmarOrden()
	{
		$orden = self::getOrdenSesion();
		if ($orden == null) {
			header('Location: /');
		}
		return OrdenDAO::save($orden);
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
