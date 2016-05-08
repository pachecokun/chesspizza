<?php

class Producto{
    private $id;
    private $tipo;
    private $precio;

    /**
     * Producto constructor.
     * @param $id
     * @param $tipo
     * @param $precio
     */
    public function __construct($id, $tipo, $precio)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->precio = $precio;
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
     * @return Producto
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     * @return Producto
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }


}