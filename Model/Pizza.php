<?php

class Pizza{
    private $producto_id;
    private $tamano;

    /**
     * Pizza constructor.
     * @param $producto_id
     * @param $tamano
     */
    public function __construct($producto_id, $tamano)
    {
        $this->producto_id = $producto_id;
        $this->tamano = $tamano;
    }

    /**
     * @return mixed
     */
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * @param mixed $tamano
     * @return Pizza
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;
        return $this;
    }


}