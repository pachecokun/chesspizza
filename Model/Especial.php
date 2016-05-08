<?php
class Especial{
    private $id;
    private $precio_pizza;
    private $pizza_id;

    /**
     * Especial constructor.
     * @param $id
     * @param $precio_pizza
     * @param $pizza_id
     */
    public function __construct($id, $precio_pizza, $pizza_id)
    {
        $this->id = $id;
        $this->precio_pizza = $precio_pizza;
        $this->pizza_id = $pizza_id;
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
    public function getPrecioPizza()
    {
        return $this->precio_pizza;
    }

    /**
     * @param mixed $precio_pizza
     * @return Especial
     */
    public function setPrecioPizza($precio_pizza)
    {
        $this->precio_pizza = $precio_pizza;
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

}