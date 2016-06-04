<?php

/**
 * Created by PhpStorm.
 * User: Pacheco
 * Date: 03/06/2016
 * Time: 06:52 PM
 */
class OrdenProducto
{
    private $orden_id;
    private $precio;
    private $cantidad;
    private $producto;

    /**
     * OrdenProducto constructor.
     * @param $orden_id
     * @param $precio
     * @param $cantidad
     * @param $producto
     */
    public function __construct($orden_id = null, $precio = null, $cantidad = null, $producto = null)
    {
        $this->orden_id = $orden_id;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->producto = $producto;
    }

    /**
     * @return mixed
     */
    public function getOrdenId()
    {
        return $this->orden_id;
    }

    /**
     * @param mixed $orden_id
     * @return OrdenProducto
     */
    public function setOrdenId($orden_id)
    {
        $this->orden_id = $orden_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @param mixed $producto
     * @return OrdenProducto
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     * @return OrdenProducto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
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
     * @return OrdenProducto
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        return $this;
    }


}