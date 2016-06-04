<?php

class Orden{
    private $id;
    private $fecha_hora;
    private $direccion;
    private $sucursal_id;
    private $repartidor_id;
    private $lat;
    private $lon;
    private $nombre_cliente;
    private $tel_cliente;
    private $email_cliente;

    private $productos;
    /**
     * Orden constructor.
     * @param $id
     * @param $fecha_hora
     * @param $direccion
     * @param $sucursal_id
     * @param $repartidor_id
     * @param $lat
     * @param $lon
     * @param $nombre_cliente
     * @param $tel_cliente
     * @param $email_cliente
     */
    public function __construct($id=null, $fecha_hora=null, $direccion=null, $sucursal_id=null, $repartidor_id=null, $lat=null, $lon=null, $nombre_cliente=null, $tel_cliente=null, $email_cliente=null)
    {
        $this->id = $id;
        $this->fecha_hora = $fecha_hora;
        $this->direccion = $direccion;
        $this->sucursal_id = $sucursal_id;
        $this->repartidor_id = $repartidor_id;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->nombre_cliente = $nombre_cliente;
        $this->tel_cliente = $tel_cliente;
        $this->email_cliente = $email_cliente;
    }

    /**
     * @return mixed
     */
    public function getTelCliente()
    {
        return $this->tel_cliente;
    }

    /**
     * @param mixed $tel_cliente
     * @return Orden
     */
    public function setTelCliente($tel_cliente)
    {
        $this->tel_cliente = $tel_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailCliente()
    {
        return $this->email_cliente;
    }

    /**
     * @param mixed $email_cliente
     * @return Orden
     */
    public function setEmailCliente($email_cliente)
    {
        $this->email_cliente = $email_cliente;
        return $this;
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
     * @return Orden
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Orden
     */
    public function setFechaHora($fecha_hora)
    {
        $this->fecha_hora = $fecha_hora;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     * @return Orden
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSucursalId()
    {
        return $this->sucursal_id;
    }

    /**
     * @param mixed $sucursal_id
     * @return Orden
     */
    public function setSucursalId($sucursal_id)
    {
        $this->sucursal_id = $sucursal_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRepartidorId()
    {
        return $this->repartidor_id;
    }

    /**
     * @param mixed $repartidor_id
     * @return Orden
     */
    public function setRepartidorId($repartidor_id)
    {
        $this->repartidor_id = $repartidor_id;
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
     * @return Orden
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
     * @return Orden
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreCliente()
    {
        return $this->nombre_cliente;
    }

    /**
     * @param mixed $nombre_cliente
     * @return Orden
     */
    public function setNombreCliente($nombre_cliente)
    {
        $this->nombre_cliente = $nombre_cliente;
        return $this;
    }



}