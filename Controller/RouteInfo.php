<?php

/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 5/5/2016
 * Time: 15:27 PM
 */
class RouteInfo
{
    private $responseStatus;
    private $resultStatus;
    private $destination_address;
    private $origin_address;
    private $distance = ["text" => "", "value" => ""];
    private $duration = ["text" => "", "value" => ""];
    private $street;

/*
*   Origin y Dest pueden ser coordenadadas de la forma 19.998,-199.999 o una dirección
*/
    public function getRouteInfo($origin, $dest){
        /*En caso de que origin y dest sean direcciones, reemplazamos los espacios con +*/
        str_replace(" ","+",$origin);
        str_replace(" ","+",$dest);
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $origin . "&destinations=" . $dest;
        $content = file_get_contents($url);
        $json = json_decode($content, true);
        $this->responseStatus = $json["status"];
        if ($this->responseStatus == "OK") {
            $elements = $json["rows"][0]["elements"][0];
            $this->resultStatus = $elements["status"];
            if ($this->resultStatus == "OK") {
                $this->destination_address = $json["destination_addresses"][0];
                $this->origin_address = $json["origin_addresses"][0];
                $this->distance["text"] = $elements["distance"]["text"];
                $this->distance["value"] = $elements["distance"]["value"];
                $this->duration["text"] = $elements["duration"]["text"];
                $this->duration["value"] = $elements["duration"]["value"];
            }
        }
    }
    
    /*$origin y $dest deben ser las coordenadas las coordenadas*/
    public function getAddress($lat, $lon){
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lon;
        $content = file_get_contents($url);
        $json = json_decode($content, true);
        $this->responseStatus = $json["status"];
        if ($this->responseStatus == "OK") {
            $elements = $json["results"][0]["address_components"];                        
            $this->street = $elements[1]["long_name"];           
        }
    }

    public static function getFullAddress($lat, $lon){
        $routeInfo = new RouteInfo();
        $routeInfo->getRouteInfo($lat.",".$lon,$lat.",".$lon);
        return $routeInfo->getOriginAddress();
    }

    /**
     *
     * @return String El código de respuesta de la petición, puede tomar uno de los siguientes valores:
     * -OK indica que la respuesta contiene un resultado válido.
     * -INVALID_REQUEST indica que la solicitud proporcionada no era válida.
     * -OVER_QUERY_LIMIT indica que el servicio recibió demasiadas solicitudes desde tu aplicación dentro del período permitido.
     * -REQUEST_DENIED indica que el servicio no permitió que tu aplicación usara el servicio de matriz de distancia.
     * -UNKNOWN_ERROR indica que no se pudo procesar una solicitud a la matriz de distancia debido a un error en el servidor. La solicitud puede tener éxito si realizas un nuevo intento.
     */
    public function getResponseStatus()
    {
        return $this->responseStatus;
    }

    /**
     *
     * @return String El código de resultado de la petición, puede tomar uno de los siguientes valores:
     * -OK indica que la respuesta contiene un result válido.
     * -NOT_FOUND: indica que el origen o destino de esta sincronización no pudieron someterse a geocodificación.
     * -ZERO_RESULTS indica que no fue posible hallar una ruta entre el origen y el destino.
     */
    public function getResultStatus()
    {
        return $this->resultStatus;
    }

    /**
     * @return String la dirección completa de destino en caso de que ResultStatus y ResponseStatus sean OK
     */

    public function getDestinationAddress()
    {
        return $this->destination_address;
    }
    

    /**
     * @return String la dirección completa de origen en caso de que ResultStatus y ResponseStatus sean OK
     */

    public function getOriginAddress()
    {
        return $this->origin_address;
    }

    /**
     * @return String la distancia en texto en caso de que ResultStatus y ResponseStatus sean OK
     */

    public function getDistanceText()
    {
        return $this->distance["text"];
    }

    /**
     * @return String la distancia en metros en caso de que ResultStatus y ResponseStatus sean OK
     */

    public function getDistanceValue()
    {
        return $this->distance["value"];
    }

    /**
     * @return String el tiempo en texto en caso de que ResultStatus y ResponseStatus sean OK
     */

    public function getDurationText()
    {
        return $this->duration["text"];
    }

    /**
     * @return String el tiempo en segundos en caso de que ResultStatus y ResponseStatus sean OK
     */

    public function getDurationValue()
    {
        return $this->duration["value"];
    }
    
    /**
     * @return String la calle en caso de que ResultStatus y ResponseStatus sean OK
     */

    public function getStreet()
    {
        return $this->street;
    }
    
}
