<?php

class Empleado{
    private $id;
	private $sucursal;
	private $username;
	private $password;
    private $nombre;
	private $apPaterno;
	private $apMaterno;
    private $telefono;
	private $tipoEmpleado;

    public function __construct(
		$id=null,
		$sucursal= null,
		$username=null,
		$password=null,
		$nombre=null,
		$apPaterno=null,
		$apMaterno=null,
		$telefono=null,
		$tipoEmpleado=null)
    {
        $this->id = $id;
		$this->sucursal= $sucursal;
		$this->username= $username;
		$this->password = $password;
        $this->nombre = $nombre;
		$this->apPaterno = $apPaterno;
		$this->apMaterno = $apMaterno;
        $this->telefono = $telefono;
		$this->tipoEmpleado = $tipoEmpleado;
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
     * @return Empleado
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
	
	/**
     * @return mixed
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * @param mixed $sucursal
     * @return Empleado
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;
        return $this;
    }
	
	/**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return Empleado
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }	
	
	/**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Empleado
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     * @return Empleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApPaterno()
    {
        return $this->apPaterno;
    }

    /**
     * @param mixed $apPaterno
     * @return Empleado
     */
    public function setApPaterno($apPaterno)
    {
        $this->apPaterno = $apPaterno;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApMaterno()
    {
        return $this->apMaterno;
    }

    /**
     * @param mixed $apMaterno
     * @return Empleado
     */
    public function setApMaterno($apMaterno)
    {
        $this->apMaterno = $apMaterno;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoEmpleado()
    {
        return $this->tipoEmpleado;
    }

    /**
     * @param mixed $tipoEmpleado
     * @return Empleado
     */
    public function setTipoEmpleado($tipoEmpleado)
    {
        $this->tipoEmpleado = $tipoEmpleado;
        return $this;
    }
}