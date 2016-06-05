<?php
class Especial{
    private $id;
    private $precio;
    private $nombre;
    private $pizza;

    /**
     * Especial constructor.
     * @param $id
     * @param $precio_pizza
     * @param null $nombre
     * @param null $pizza
     * @internal param $pizza_id
     */
    public function __construct($producto_id = null, $precio_pizza = null, $nombre = null, $pizza = null)
    {
        $this->id = $producto_id;
        $this->precio = $precio_pizza;
        $this->nombre = $nombre;
        $this->pizza = $pizza;
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
    /**
     * @return null
     */
    public function getPizza()
    {
        return $this->pizza;
    }

    /**
     * @param null $pizza
     * @return Especial
     */
    public function setPizza($pizza)
    {
        $this->pizza = $pizza;
        return $this;
    }


}