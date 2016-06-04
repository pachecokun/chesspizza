<?php

class Paquete{
    private $producto_id;
    private $especial;
    private $refresco;
    private $nombre;
    private $precio;

    /**
     * Paquete constructor.
     * @param $producto_id
     * @param $especial
     * @param $refresco
     * @param $nombre
     */
    public function __construct($producto_id = null, $especial = null, $refresco = null, $nombre = null, $precio = null)
    {
        $this->producto_id = $producto_id;
        $this->especial = $especial;
        $this->refresco = $refresco;
        $this->nombre = $nombre;
        $this->precio = $precio;
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
    public function getEspecial()
    {
        return $this->especial;
    }

    /**
     * @param mixed $especial
     * @return Paquete
     */
    public function setEspecial($especial)
    {
        $this->especial = $especial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefresco()
    {
        return $this->refresco;
    }

    /**
     * @param mixed $refresco
     * @return Paquete
     */
    public function setRefresco($refresco)
    {
        $this->refresco = $refresco;
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

    /**
     * @return null
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param null $precio
     * @return Paquete
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }
    

}