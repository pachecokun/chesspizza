<?php
class Sucursal{
    
    private $id;
    private $direccion;
    private $lat;
    private $lon;

    /**
     * Sucursal constructor.
     * @param $id
     * @param $direccion
     * @param $lon
     * @param $lat
     */
    public function __construct($id, $direccion, $lon, $lat)
    {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->lon = $lon;
        $this->lat = $lat;
    }


}