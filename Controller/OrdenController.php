<?php
require_once __DIR__ . "/../DAO/OrdenDAO.php";
require_once __DIR__ . "/../DAO/PizzaDAO.php";
require_once __DIR__ . "/../DAO/PaqueteDAO.php";
require_once __DIR__ . "/../DAO/EspecialDAO.php";
require_once __DIR__ . "/../DAO/OrillaDAO.php";
require_once __DIR__ . "/../DAO/SucursalDAO.php";
require_once __DIR__ . "/../Model/Orden.php";
require_once __DIR__ . "/EspecialController.php";
require_once __DIR__ . "/SucursalController.php";



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
		$sucursal = SucursalDAO::get($orden->getSucursalId());
		foreach (self::getIngredientes($orden) as $ingrediente) {
			SucursalController::reducirInventarioIngrediente($sucursal, $ingrediente);
		}
		foreach (self::getRefrescos($orden) as $refresco) {
			SucursalController::reducirInventarioRefresco($sucursal, $refresco);
		}
		$op = new Operacion();
		$op->setStatus(StatusDAO::get(STATUS_CONFIRMADA))
			->setLat($sucursal->getLat())
			->setLon($sucursal->getLon());
		$orden->addOperacion($op);
		return OrdenDAO::save($orden);
	}

	public static function getPrecioOrden($orden)
	{
		$total = 0;
		foreach ($orden->getEspeciales() as $obj) {
			$total += self::getPrecioEspecial($obj, $obj->cantidad);
		}
		foreach ($orden->getPaquetes() as $obj) {
			$total += self::getPrecioPaquete($obj, $obj->cantidad);
		}
		foreach ($orden->getRefrescos() as $obj) {
			$total += self::getPrecioRefresco($obj, $obj->cantidad);
		}
		return $total;
	}

	public static function getRefrescos($orden)
	{
		$refrescos = array();

		foreach ($orden->getRefrescos() as $ref1) {
			$found = false;
			foreach ($refrescos as $i => $ref2) {
				if ($ref1->getId() == $ref2->getId()) {
					$found = true;
					$refrescos[$i]->cantidad = $refrescos[$i]->cantidad + $ref1->cantidad;
					break;
				}
			}
			if (!$found) {
				$refrescos[] = $ref1;
			}
		}

		foreach ($orden->getPaquetes() as $paquete) {
			$ref1 = $paquete->getRefresco();
			$found = false;
			foreach ($refrescos as $i => $ref2) {
				if ($ref1->getId() == $ref2->getId()) {
					$found = true;
					$refrescos[$i]->cantidad = $refrescos[$i]->cantidad + $paquete->cantidad;
					break;
				}
			}
			if (!$found) {
				$ref1->cantidad = $paquete->cantidad;
				$refrescos[] = $ref1;
			}
		}
		return $refrescos;
	}

	public static function getIngredientes($orden)
	{
		$ingredientes = array();
		foreach ($orden->getPizzas() as $pizza) {
			foreach ($pizza->getIngredientes() as $ing1) {
				$found = false;
				foreach ($ingredientes as $i => $ing2) {
					if ($ing1->getId() == $ing2->getId()) {
						$found = true;
						$ingredientes[$i]->cantidad = $ingredientes[$i]->cantidad + $pizza->cantidad;
						break;
					}
				}
				if (!$found) {
					$ing1->cantidad = $pizza->cantidad;
					$ingredientes[] = $ing1;
				}
			}
		}
		foreach ($orden->getEspeciales() as $especial) {
			foreach ($especial->getPizza()->getIngredientes() as $ing1) {
				$found = false;
				foreach ($ingredientes as $i => $ing2) {
					if ($ing1->getId() == $ing2->getId()) {
						$found = true;
						$ingredientes[$i]->cantidad = $ingredientes[$i]->cantidad + $especial->cantidad;
						break;
					}
				}
				if (!$found) {
					$ing1->cantidad = $especial->cantidad;
					$ingredientes[] = $ing1;
				}
			}
		}
		foreach ($orden->getPaquetes() as $paquete) {
			foreach ($paquete->getEspecial()->getPizza()->getIngredientes() as $ing1) {
				$found = false;
				foreach ($ingredientes as $i => $ing2) {
					if ($ing1->getId() == $ing2->getId()) {
						$found = true;
						$ingredientes[$i]->cantidad = $ingredientes[$i]->cantidad + $paquete->cantidad;
						break;
					}
				}
				if (!$found) {
					$ing1->cantidad = $paquete->cantidad;
					$ingredientes[] = $ing1;
				}
			}
		}
		return $ingredientes;
	}

	public static function getFaltantes($orden)
	{
		$sucursal = SucursalDAO::get($orden->getSucursalId());
		$ingredientes = self::getIngredientes($orden);
		$refrescos = self::getRefrescos($orden);
		$ing_f = array();
		$ref_f = array();

		foreach ($ingredientes as $ingrediente) {
			if (SucursalController::getInventarioIngrediente($sucursal, $ingrediente) < $ingrediente->cantidad) {
				$ing_f[] = $ingrediente;
			}
		}

		foreach ($refrescos as $refresco) {
			if (SucursalController::getInventarioRefresco($sucursal, $refresco) < $refresco->cantidad) {
				$ref_f[] = $refresco;
			}
		}

		return array(
			"ingredientes" => $ing_f,
			"refrescos" => $ref_f
		);

	}

	public static function getOrden($id, $email)
	{
		$orden = OrdenDAO::get($id);
		if (!empty($orden) && $orden->getEmailCliente() == $email) {
			return $orden;
		} else {
			return null;
		}
	}

	public static function confirmarRecepcion($id)
	{
		$orden = OrdenDAO::get($id);
		$orden->addOperacion(new Operacion(null, $id, null, $orden->getLat(), $orden->getLon(), StatusDAO::get(STATUS_ENTREGADA)));
		OrdenDAO::update($orden);
	}
}

?>
