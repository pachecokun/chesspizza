<?php

class Ingrediente{
    private $id;
    private $nombre;
    private $precio;

    /**
     * Ingrediente constructor.
     * @param $id
     * @param $nombre
     * @param $precio
     */
    public function __construct($id = null, $nombre = null, $precio = null)
    {
        $this->id = $id;
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
     * @return Ingrediente
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
     * @return Ingrediente
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
     * @return Ingrediente
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }



}