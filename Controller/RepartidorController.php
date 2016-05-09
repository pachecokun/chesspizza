<?php
include_once(__DIR__.'/../DAO/RepartidorDAO.php');

class RepartidorController{
    public static function registrar($nombre,$tel){
        $r = new Repartidor();
        $r->setNombre($nombre)->setTel($tel);
        print_r($r);
        return RepartidorDAO::save(new Repartidor($r));
    }
}