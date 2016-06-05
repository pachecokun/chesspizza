<?php

class Pizza{
    private $id;
    private $ingredientes;

    /**
     * Pizza constructor.
     * @param $producto_id
     * @param $tamano
     * @param null $ingredientes
     */
    public function __construct($producto_id = null, $ingredientes = null)
    {
        $this->id = $producto_id;
        $this->ingredientes = $ingredientes;
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
     * @return Pizza
     */
    public function setId($id)
    {
        $this->id = $id;
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