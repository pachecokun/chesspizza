<?php

class Orilla
{
    private $id;
    private $nombre;
    private $precio_extra;

    /**
     * Orilla constructor.
     * @param $id
     * @param $nombre
     * @param $precioExtra
     */
    public function __construct($id = null, $nombre = null, $precioExtra = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio_extra = $precioExtra;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     * @return Orilla
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param null $nombre
     * @return Orilla
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return null
     */
    public function getPrecioExtra()
    {
        return $this->precio_extra;
    }

    /**
     * @param null $precio_extra
     * @return Orilla
     */
    public function setPrecioExtra($precio_extra)
    {
        $this->precio_extra = $precio_extra;
        return $this;
    }


}