<?php

class Repartidor{
    private $id;
    private $nombre;
    private $tel;

    /**
     * Repartidor constructor.
     * @param $id
     * @param $nombre
     * @param $tel
     */
    public function __construct($id=null, $nombre=null, $tel=null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tel = $tel;
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
     * @return Repartidor
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     * @return Repartidor
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
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
     * @return Repartidor
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

}