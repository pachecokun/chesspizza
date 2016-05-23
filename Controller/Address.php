<?php

/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 5/22/2016
 * Time: 19:30 PM
 */
class Address
{
    private $status;
    private $street;
    private $number;
    private $zipCode;
    private $mun;
    private $neighborhood;

    /**
     * Address constructor.
     */
    public function __construct($lat,$lon)
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lon;
        $content = file_get_contents($url);
        $json = json_decode($content, true);
        $this->status = $json["status"];
        if ($this->status == "OK") {
            $elements = $json["results"][0]["address_components"];
            $this->number = $elements[0]["long_name"];
            $this->street = $elements[1]["long_name"];
            $this->neighborhood = $elements[2]["long_name"];
            $this->mun = $elements[3]["long_name"];
            $this->zipCode = $elements[6]["long_name"];
        }
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @return mixed
     */
    public function getMun()
    {
        return $this->mun;
    }

    /**
     * @return mixed
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }



}
