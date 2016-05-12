<?php

class Sucursal{
    private $id;
    private $direccion;
    private $lat;
    private $lon;
    private $nombre;
	private $password;

    /**
     * Sucursal constructor.
     * @param $id
     * @param $direccion
     * @param $lat
     * @param $lon
     * @param $nombre
	 * @param $password
     */
    public function __construct($id, $direccion, $lat, $lon, $nombre, $password)
    {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->nombre = $nombre;
        $this->password = $password;
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
     * @return Sucursal
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Sucursal
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
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
     * @return Sucursal
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
     * @return Sucursal
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
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
     * @return Sucursal
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}