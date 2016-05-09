<?php
include_once(__DIR__.'/../DAO/RepartidorDAO.php');

class RepartidorController{
    public static function registrar($nombre,$tel){
        $r = new Repartidor();
        $r->setNombre($nombre)->setTel($tel);
        return RepartidorDAO::save(new Repartidor($r));
    }
}