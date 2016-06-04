<?php

class Pizza{
    private $producto_id;
    private $tamano;
    private $ingredientes;

    /**
     * Pizza constructor.
     * @param $producto_id
     * @param $tamano
     * @param null $ingredientes
     */
    public function __construct($producto_id = null, $tamano = null, $ingredientes = null)
    {
        $this->producto_id = $producto_id;
        $this->tamano = $tamano;
        $this->ingredientes = $ingredientes;
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

    /**
     * @return null
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * @param null $producto_id
     * @return Pizza
     */
    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
        return $this;
    }

    /**
     * @return null
     */
    public function getIngredientes()
    {
        return $this->ingredientes;
    }

    /**
     * @param null $ingredientes
     * @return Pizza
     */
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;
        return $this;
    }


}