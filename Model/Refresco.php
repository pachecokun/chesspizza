<?php

class Refresco{
    private $producto_id;
    private $nombre;

    /**
     * Refresco constructor.
     * @param $producto_id
     * @param $nombre
     */
    public function __construct($producto_id, $nombre)
    {
        $this->producto_id = $producto_id;
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
     * @return Refresco
     */
    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
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
     * @return Refresco
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }


}