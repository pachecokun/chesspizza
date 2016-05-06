<?php

class Sucursal
{

    private $idSucursal;
    private $nombre;
    private $direccion;
    private $lat;
    private $lon;

    /**
     * Sucursal constructor.
     * @param $idSucursal
     * @param $nombre
     * @param $direccion
     * @param $lon
     * @param $lat
     */
    public function __construct($idSucursal, $nombre, $direccion, $lat, $lon)
    {
        $this->idSucursal = $idSucursal;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->lon = $lon;
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getIdSucursal()
    {
        return $this->idSucursal;
    }

    /**
     * @param mixed $idSucursal
     */
    public function setIdSucursal($idSucursal)
    {
        $this->idSucursal = $idSucursal;
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
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
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
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
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
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    }




    public function toString()
    {
        $infoSucursal = "ID Sucursal: " . $this->idSucursal . "<br>";
        $infoSucursal .= "Nombre: " . $this->nombre . "<br>";
        $infoSucursal .= "Direccion: " . $this->direccion . "<br>";
        $infoSucursal .= "Lat: " . $this->lat . "<br>";
        $infoSucursal .= "Lon: " . $this->lon . "<br>";
        return $infoSucursal;
    }


}

?>