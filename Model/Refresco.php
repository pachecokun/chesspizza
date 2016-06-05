<?php

class Refresco{
    private $id;
    private $nombre;

    /**
     * Refresco constructor.
     * @param $producto_id
     * @param $nombre
     */
    public function __construct($producto_id, $nombre)
    {
        $this->id = $producto_id;
        $this->nombre = $nombre;
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


}