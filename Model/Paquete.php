<?php

class Paquete{
    private $producto_id;
    private $refresco_producto_id;
    private $especial_id;
    private $nombre;

    /**
     * Paquete constructor.
     * @param $producto_id
     * @param $refresco_producto_id
     * @param $especial_id
     * @param $nombre
     */
    public function __construct($producto_id=null, $refresco_producto_id=null, $especial_id=null, $nombre=null)
    {
        $this->producto_id = $producto_id;
        $this->refresco_producto_id = $refresco_producto_id;
        $this->especial_id = $especial_id;
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * @param mixed $producto_id
     * @return Paquete
     */
    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefrescoProductoId()
    {
        return $this->refresco_producto_id;
    }

    /**
     * @param mixed $refresco_producto_id
     * @return Paquete
     */
    public function setRefrescoProductoId($refresco_producto_id)
    {
        $this->refresco_producto_id = $refresco_producto_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecialId()
    {
        return $this->especial_id;
    }

    /**
     * @param mixed $especial_id
     * @return Paquete
     */
    public function setEspecialId($especial_id)
    {
        $this->especial_id = $especial_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     * @return Paquete
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }


}