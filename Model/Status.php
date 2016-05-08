<?php

class Status{
    private $id;
    private $descripcion;

    /**
     * Status constructor.
     * @param $id
     * @param $descripcion
     */
    public function __construct($id, $descripcion)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
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
     * @return Status
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


}