<?php

class Paquete{
    private $producto_id;
    private $refresco_producto_id;
    private $especial_id;

    /**
     * Paquete constructor.
     * @param $especial_id
     * @param $producto_id
     * @param $refresco_producto_id
     */
    public function __construct($especial_id, $producto_id, $refresco_producto_id)
    {
        $this->especial_id = $especial_id;
        $this->producto_id = $producto_id;
        $this->refresco_producto_id = $refresco_producto_id;
    }

    /**
     * @return mixed
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * @param mixed $producto_id
     * @return Paquete
     */
    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefrescoProductoId()
    {
        return $this->refresco_producto_id;
    }

    /**
     * @param mixed $refresco_producto_id
     * @return Paquete
     */
    public function setRefrescoProductoId($refresco_producto_id)
    {
        $this->refresco_producto_id = $refresco_producto_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecialId()
    {
        return $this->especial_id;
    }

    /**
     * @param mixed $especial_id
     * @return Paquete
     */
    public function setEspecialId($especial_id)
    {
        $this->especial_id = $especial_id;
        return $this;
    }


}