<?php

class InvIngrediente{
    private $sucursal;
    private $ingrediente;
    private $existencias;

    /**
     * Ingrediente constructor.
     * @param $sucursal
     * @param $ingrediente
     * @param $existencias
     */
    public function __construct($sucursal = null, $ingrediente = null, $existencias = null)
    {
        $this->sucursal = $sucursal;
        $this->ingrediente = $ingrediente;
        $this->existencias = $existencias;
    }

    /**
     * @return mixed
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * @param mixed $sucursal
     * @return InvIngrediente
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIngrediente()
    {
        return $this->ingrediente;
    }

    /**
     * @param mixed $ingrediente
     * @return InvIngrediente
     */
    public function setIngrediente($ingrediente)
    {
        $this->ingrediente = $ingrediente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExistencias()
    {
        return $this->existencias;
    }

    /**
     * @param mixed $existencias
     * @return InvIngrediente
     */
    public function setExistencias($existencias)
    {
        $this->existencias = $existencias;
        return $this;
    }

}