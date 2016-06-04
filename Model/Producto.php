<?php

class Producto{
    private $id;
    private $tipo;
    private $precio;
    private $pizza, $especial, $paquete, $refresco;

    /**
     * Producto constructor.
     * @param $id
     * @param $tipo
     * @param $precio
     * @param $pizza
     * @param $especial
     * @param $paquete
     * @param $refresco
     */
    public function __construct($id = null, $tipo = null, $precio = null, $pizza = null, $especial = null, $paquete = null, $refresco = null)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->pizza = $pizza;
        $this->especial = $especial;
        $this->paquete = $paquete;
        $this->refresco = $refresco;
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
    public function getPizza()
    {
        return $this->pizza;
    }

    /**
     * @param mixed $pizza
     * @return Producto
     */
    public function setPizza($pizza)
    {
        $this->pizza = $pizza;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecial()
    {
        return $this->especial;
    }

    /**
     * @param mixed $especial
     * @return Producto
     */
    public function setEspecial($especial)
    {
        $this->especial = $especial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaquete()
    {
        return $this->paquete;
    }

    /**
     * @param mixed $paquete
     * @return Producto
     */
    public function setPaquete($paquete)
    {
        $this->paquete = $paquete;
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
     * @return Producto
     */
    public function setRefresco($refresco)
    {
        $this->refresco = $refresco;
        return $this;
    }



}