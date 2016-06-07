<?php

class Repartidor{
    private $status;
    private $empleado;

    /**
     * Repartidor constructor.
     * @param $status
     * @param $empleado
     */
    public function __construct($status = null, $empleado = null)
    {
        $this->status = $status;
        $this->empleado = $empleado;
    }

    /**
     * @return null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param null $status
     * @return Repartidor
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * @param null $empleado
     * @return Repartidor
     */
    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
        return $this;
    }


}