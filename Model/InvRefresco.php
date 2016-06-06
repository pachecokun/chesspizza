<?php

class InvRefresco{
    private $sucursal;
    private $refresco;
    private $cantidad;

    /**
     * InvRefresco constructor.
     * @param $sucursal
     * @param $refresco
     * @param $cantidad
     */
    public function __construct($sucursal = null, $refresco = null, $cantidad = null)
    {
        $this->sucursal = $sucursal;
        $this->refresco = $refresco;
        $this->cantidad = $cantidad;
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
     * @return InvRefresco
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefresco()
    {
        return $this->refresco;
    }

    /**
     * @param mixed $refresco
     * @return InvRefresco
     */
    public function setRefresco($refresco)
    {
        $this->refresco = $refresco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     * @return InvRefresco
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        return $this;
    }

}