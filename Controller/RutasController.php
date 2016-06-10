<?php
require_once __DIR__ . "/OrdenController.php";

define("CARGA_MAXIMA", 10);

class RutasController
{

    public static function getItems($orden)
    {
        $n = 0;
        foreach ($orden->getPizzas() as $obj) {
            $n += $obj->cantidad;
        }
        foreach ($orden->getPaquetes() as $obj) {
            $n += $obj->cantidad * 2;
        }
        foreach ($orden->getEspeciales() as $obj) {
            $n += $obj->cantidad;
        }
        foreach ($orden->getRefrescos() as $obj) {
            $n += $obj->cantidad;
        }
        return $n;
    }

    public static function getItemsTotal($ordenes)
    {
        $t = 0;
        foreach ($ordenes as $orden) {
            $t += self::getItems($orden);
        }
        return $t;
    }

    public static function getTiempoPreparacion($orden)
    {
        $n = 0;
        foreach ($orden->getPizzas() as $obj) {
            $n += $obj->cantidad;
        }
        foreach ($orden->getPaquetes() as $obj) {
            $n += $obj->cantidad;
        }
        foreach ($orden->getEspeciales() as $obj) {
            $n += $obj->cantidad;
        }
        return $n * 10;
    }

    public static function getHoraMax($orden)
    {
        return self::getTimeCad($orden->getFechaHora()) + (self::getTiempoPreparacion($orden) + 30) * 60;
    }

    public static function getTimeCad($cad)
    {
        return DateTime::createFromFormat("Y-m-d H:i:s", $cad)->getTimestamp();
    }

    public static function getTiempoRestante($orden)
    {
        date_default_timezone_set("America/Mexico_City");
        $t = self::getHoraMax($orden) - time();
        return $t / 60;
    }

    public static function getProximasOrdenes($sucursal)
    {
        $ordenes = SucursalDAO::getOrdenesEspera($sucursal);
        $res = array();
        foreach ($ordenes as $orden) {
            $t1 = self::getTiempoRestante($orden);
            $ins = false;
            foreach ($res as $i => $o) {
                $t2 = self::getTiempoRestante($o);
                if ($t1 < $t2) {
                    for ($j = count($res) - 1; $j >= $i; $i--) {
                        $res[$j + 1] = $res[$j];
                    }
                    $res[$i] = $orden;
                    $ins = true;
                    break;
                }
            }
            if (!$ins) {
                $res[] = $orden;
            }
        }
        return $res;
    }

    public static function getCoords($sucursal, $orden)
    {
        return array(
            $orden->getLat() - $sucursal->getLat(),
            $orden->getLon() - $sucursal->getLon()
        );
    }

    public static function getCuadreante($sucursal, $orden)
    {
        $coords = self::getCoords($sucursal, $orden);
        if ($coords[0] > 0) {
            if ($coords[1] > 0) {
                return 1;
            } else {
                return 2;
            }
        } else {
            if ($coords[1] > 0) {
                return 4;
            } else {
                return 3;
            }
        }
    }

    public static function isUrg($orden)
    {
        return self::getTiempoRestante($orden) < 35;
    }


    public static function getRutas($sucursal)
    {
        $repartidores = RepartidorDAO::getDisponiblesSucursal($sucursal);
        $rutas = array();
        $urgentes = array(
            1 => array(),
            2 => array(),
            3 => array(),
            4 => array()
        );
        $otras = array(
            1 => array(),
            2 => array(),
            3 => array(),
            4 => array()
        );

        foreach (self::getProximasOrdenes($sucursal) as $orden) {
            if (self::isUrg($orden)) {
                $urgentes[self::getCuadreante($sucursal, $orden)] [] = $orden;
            } else {
                $otras[self::getCuadreante($sucursal, $orden)] [] = $orden;
            }
        }
        $listo = 0;
        print_r($repartidores);
        while (!empty($repartidores) && $listo < 4) {
            $listo = 0;
            for ($i = 1; $i <= 4; $i++) {
                $ruta = array();
                if (!empty($urgentes[$i] || self::getItemsTotal($otras[$i]) > 0.7 * CARGA_MAXIMA)) {
                    $repartidor = array_shift($repartidores);
                    while (!empty($urgentes[$i])) {
                        $orden = array_shift($urgentes[$i]);
                        if (self::getItemsTotal($ruta) > CARGA_MAXIMA) {
                            break;
                        }
                        $orden->setRepartidorId($repartidor->getEmpleado()->getId());
                        $orden->addOperacion(new Operacion(null, $orden->getId(), null, $sucursal->getLat(), $sucursal->getLon(), StatusDAO::get(STATUS_EN_CAMINO)));
                        OrdenDAO::update($orden);
                        $ruta[] = $orden;
                    }
                    while (!empty($otras[$i])) {
                        $orden = array_shift($otras[$i]);
                        if (self::getItemsTotal($ruta) > CARGA_MAXIMA) {
                            break;
                        }
                        $orden->setRepartidorId($repartidor->getEmpleado()->getId());
                        $orden->addOperacion(new Operacion(null, $orden->getId(), null, $sucursal->getLat(), $sucursal->getLon(), StatusDAO::get(STATUS_EN_CAMINO)));
                        OrdenDAO::update($orden);
                        $ruta[] = $orden;
                    }
                    $rutas[] = $ruta;
                    $repartidor->setStatus(1);
                    RepartidorDAO::update($repartidor);
                } else {
                    $listo++;
                }

            }
        }
        return $rutas;
    }
}