<?php

include_once __DIR__.'/../DAO/RefrescoDAO.php';
include_once __DIR__.'/../DAO/InvRefrescoDAO.php';

class RefrescoController{
	public static function getAllBySucursalId($sucId){
		return RefrescoDAO::getRefrescosSucursal($sucId);
	}
	
    public static function getAll(){
        return RefrescoDAO::getAll();
    }
	
	public static function get($idRef){
		return RefrescoDAO::get($idRef);
	}
	
	public static function getCantidad($idSuc, $idRef){
		$exists = InvRefrescoDAO::get(array($idSuc, $idRef));
		if(!empty($exists)){
			return $exists->getCantidad();
		}
		else{
			return 0;
		}
	}
	
	public static function registrarRefrescoSuc($idRef, $idSuc, $cantidad){
		$exists = InvRefrescoDAO::get(array($idSuc, $idRef));
		if(!empty($exists)){
			$cantidad = $cantidad + $exists->getCantidad();
			return InvRefrescoDAO::update($exists->setCantidad($cantidad));
		}
		else{
			return InvRefrescoDAO::save(new InvRefresco($idSuc, $idRef, $cantidad));
		}
	}
	
	public static function updateCantidad($idRef, $idSuc, $cantidad){
		$exists = InvRefrescoDAO::get(array($idSuc, $idRef));
		if(!empty($exists)){
			return InvRefrescoDAO::update($exists->setCantidad($cantidad));
		}
		else{
			return InvRefrescoDAO::save(new InvRefresco($idSuc, $idRef, $cantidad));
		}
	}
	
}