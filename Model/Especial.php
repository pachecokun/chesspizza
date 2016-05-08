<?php
class Especial{
    private $id;
    private $precio;
    private $pizza_id;
    private $nombre;

    /**
     * Especial constructor.
     * @param $id
     * @param $precio_pizza
     * @param $pizza_id
     */
    public function __construct($id = null, $precio_pizza = null, $pizza_id = null,$nombre=null)
    {
        $this->id = $id;
        $this->precio = $precio_pizza;
        $this->pizza_id = $pizza_id;
        $this->nombre = null;
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
     * @return Especial
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
     * @return Especial
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPizzaId()
    {
        return $this->pizza_id;
    }

    /**
     * @param mixed $pizza_id
     * @return Especial
     */
    public function setPizzaId($pizza_id)
    {
        $this->pizza_id = $pizza_id;
        return $this;
    }

    /**
     * @return null
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param null $nombre
     * @return Especial
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

}