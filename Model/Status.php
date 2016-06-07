<?php
define("STATUS_CONFIRMADA", 1);
define("STATUS_HORNO", 2);
define("STATUS_LISTA", 3);
define("STATUS_ESPERA_REPARTIDOR", 4);
define("STATUS_EN_CAMINO", 5);
define("STATUS_ENTREGADA", 6);
define("STATUS_CANCELADA", 7);
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