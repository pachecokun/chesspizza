<?php

class Operacion{
    private $id;
    private $orden_id;
    private $fecha_hora;
    private $lat;
    private $lon;
    private $status;

    /**
     * Operacion constructor.
     * @param $id
     * @param $orden_id
     * @param $fecha_hora
     * @param $lat
     * @param $lon
     * @param null $status
     */
    public function __construct($id = null, $orden_id = null, $fecha_hora = null, $lat = null, $lon = null, $status = null)
    {
        $this->id = $id;
        $this->orden_id = $orden_id;
        $this->fecha_hora = $fecha_hora;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->status = $status;
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
     * @return Operacion
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return Operacion
     */
    public function setOrdenId($orden_id)
    {
        $this->orden_id = $orden_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaHora()
    {
        return $this->fecha_hora;
    }

    /**
     * @param mixed $fecha_hora
     * @return Operacion
     */
    public function setFechaHora($fecha_hora)
    {
        $this->fecha_hora = $fecha_hora;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     * @return Operacion
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @param mixed $lon
     * @return Operacion
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
        return $this;
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
     * @return Operacion
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }



}