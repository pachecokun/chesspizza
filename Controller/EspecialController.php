<?php

include_once __DIR__.'/../DAO/IngredienteDAO.php';
include_once __DIR__.'/../DAO/EspecialDAO.php';
include_once __DIR__.'/../DAO/PizzaDAO.php';
include_once __DIR__.'/IngredienteController.php';

class EspecialController{
    public static function registrar(){

    }

    public static function getPrecio($especial)
    {
        $precio = 50;
        foreach ($especial->getPizza()->getIngredientes() as $ingrediente) {
            $precio += $ingrediente->getPrecio();
        }
        return $precio;
    }
}