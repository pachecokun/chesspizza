<?php

class Refresco{
    private $id;
    private $nombre;
    private $precio;

    /**
     * Refresco constructor.
     * @param $producto_id
     * @param $nombre
     * @param $precio
     */
    public function __construct($producto_id = null, $nombre = null, $precio = null)
    {
        $this->id = $producto_id;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Refresco
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     * @return Refresco
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }


}