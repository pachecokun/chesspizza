<?php
define("STATUS_CONFIRMADA", 1);
define("STATUS_HORNO", 2);
define("STATUS_LISTA", 3);
define("STATUS_EN_CAMINO", 4);
define("STATUS_ENTREGADA", 5);
define("STATUS_CANCELADA", 6);
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