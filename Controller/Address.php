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
            foreach($elements as $element){
              switch($elements["type"]){
                case "street_number":
                  $this->number = $element["long_name"];
                break;
                case "route":
                  $this->street = $element["long_name"];
                break;
                case "sublocality_level_1":
                  $this->neighborhood = $element["long_name"];
                break;
                case "locality":
                case "administrative_area_level_2":
                  $this->mun = $element["long_name"];
                break;
                case "postal_code":
                  $this->zipCode = $element["long_name"];
                break;                
              }                           
            } 
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
