<?php

include_once __DIR__.'/../DAO/IngredienteDAO.php';

class IngredienteController{
    public static function getAll(){
        return IngredienteDAO::getAll();
    }
}