<?php

include_once(__DIR__.'/../Model/Orden.php');
include_once(__DIR__.'/DAO.php');
include_once(__DIR__ . '/PaqueteDAO.php');

class OrdenDAO implements DAO
{
    public static function getAll($cond= "1=1",$args = array())
    {
        try {
            $sucs = array();
            $stm = Conexion::execute("SELECT * FROM Orden where ".$cond,$args);

            while ($obj = $stm->fetch()) {
                $pizzas = PizzaDAO::getOrden($obj['id']);
                $especiales = EspecialDAO::getOrden($obj['id']);
                $paquetes = PaqueteDAO::getOrden($obj['id']);
                $refrescos = RefrescoDAO::getOrden($obj['id']);
                $sucs[] = new Orden($obj['id'], $obj['fecha_hora'], $obj['direccion'], $obj['Sucursal_id'], $obj['Repartidor_id'], $obj['lat'], $obj['lon'], $obj['nombre_cliente'], $obj['tel_cliente'], $obj['email_cliente'], $pizzas, $especiales, $paquetes, $refrescos);
            }
            return $sucs;
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        } catch (Error $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public static function save($obj)
    {
        try {

            Conexion::execute("insert into Orden(fecha_hora,direccion,Sucursal_id,Repartidor_id,lat,lon,nombre_cliente,tel_cliente,email_cliente) values(NOW(),?,?,?,?,?,?,?,?)", array($obj->getDireccion(), $obj->getSucursalId(), $obj->getRepartidorId(), $obj->getLat(), $obj->getLon(), $obj->getNombreCliente(), $obj->getTelCliente(), $obj->getEmailCliente()));
            $obj->setId(Conexion::lastId());
            foreach ($obj->getPizzas() as $ob) {
                Conexion::execute("insert into orden_pizza values(null,?,?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->orilla->getId(), $ob->tamano, $ob->cantidad));
            }
            foreach ($obj->getEspeciales() as $ob) {
                Conexion::execute("insert into orden_especial values(null,?,?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->orilla->getId(), $ob->tamano, $ob->cantidad));
            }
            foreach ($obj->getPaquetes() as $ob) {
                Conexion::execute("insert into orden_paquete values(null,?,?,?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->orilla->getId(), $ob->tamano_pizza, $ob->tamano_refresco, $ob->cantidad));
            }
            foreach ($obj->getRefrescos() as $ob) {
                Conexion::execute("insert into orden_refresco values(null,?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->tamano, $ob->cantidad));
            }
            return $obj;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function update($obj)
    {
        try {
            $orig = self::get($obj->getId());
            Conexion::execute("update Orden set id=?, fecha_hora=?, direccion=?, Sucursal_id=?, Repartidor_id=?, lat=?, lon=?, nombre_cliente=?, tel_cliente=?, email_cliente=? where id = ?",array($obj->getFechaHora(),$obj->getDireccion(),$obj->getSucursalId(),$obj->getRepartidorId(),$obj->getLat(),$obj->getLon(),$obj->getNombreCliente(),$obj->getTelCliente(),$obj->getEmailCliente(),$obj->getId()));
            foreach ($obj->getPizzas() as $ob) {
                $found = false;
                foreach ($orig->getPizzas() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("insert into orden_pizza values(?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->orilla->getId(), $ob->tamano, $ob->cantidad));
                }
            }
            foreach ($orig->get() as $ob) {
                $found = false;
                foreach ($obj->get() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("delete from orden_pizza where Orden_id=? and Pizza_id = ?", array($obj->getId(), $ob->getId()));
                }
            }

            foreach ($obj->getEspeciales() as $ob) {
                $found = false;
                foreach ($orig->getEspeciales() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("insert into orden_especial values(?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->orilla->getId(), $ob->tamano, $ob->cantidad));
                }
            }
            foreach ($orig->get() as $ob) {
                $found = false;
                foreach ($obj->get() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("delete from orden_especial where Orden_id=? and Especial_id = ?", array($obj->getId(), $ob->getId()));
                }
            }

            foreach ($obj->getPaquetes() as $ob) {
                $found = false;
                foreach ($orig->getPaquetes() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("insert into orden_paquete values(?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->orilla->getId(), $ob->tamano, $ob->cantidad));
                }
            }
            foreach ($orig->get() as $ob) {
                $found = false;
                foreach ($obj->get() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("delete from orden_paquete where orden_id=? and Paquete_id = ?", array($obj->getId(), $ob->getId()));
                }
            }

            foreach ($obj->getRefrescos() as $ob) {
                $found = false;
                foreach ($orig->getRefrescos() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("insert into orden_refresco values(?,?,?,?)", array($obj->getId(), $ob->getId(), $ob->orilla->getId(), $ob->tamano, $ob->cantidad));
                }
            }
            foreach ($orig->get() as $ob) {
                $found = false;
                foreach ($obj->get() as $ob2) {
                    if ($ob == $ob2) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    Conexion::execute("delete from orden_refresco where orden_id=? and Refresco_id = ?", array($obj->getId(), $ob->getId()));
                }
            }



            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function delete($id)
    {
        try {
            Conexion::execute("delete from Orden where id=?",array($id));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        } catch (Error $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public static function get($id)
    {
        try {
            $stm = Conexion::execute("SELECT * FROM Orden where id=?",array($id));

            if ($obj = $stm->fetch()) {
                return new Orden($obj['id'],$obj['fecha_hora'],$obj['direccion'],$obj['Sucursal_id'],$obj['Repartidor_id'],$obj['lat'],$obj['lon'],$obj['nombre_cliente']);
            }
            else {
                return null;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return null;
        } catch (Error $e) {
            echo $e->getMessage();
            return null;
        }
    }

}
?>