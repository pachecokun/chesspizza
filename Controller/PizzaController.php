<?php
	require_once __DIR__.'/../DAO/PizzaDAO.php';
	include_once __DIR__.'/../DAO/IngredienteDAO.php';
	include_once __DIR__.'/../DAO/EspecialDAO.php';
	include_once __DIR__.'/IngredienteController.php';

	class PizzaController{
		public static function getPrecio($armada)
    {
        $precio = 50;
        foreach ($armada->getPizza()->getIngredientes() as $ingrediente) {
            $precio += $ingrediente->getPrecio();
        }
        return $precio;
    }
	}
