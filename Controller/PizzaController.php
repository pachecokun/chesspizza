<?php
	require_once __DIR__.'/../DAO/PizzaDAO.php';

class PizzaController
{
	public static function getPrecio($pizza)
	{
		$precio = 50;
		foreach ($pizza->getPizza()->getIngredientes() as $ingrediente) {
			$precio += $ingrediente->getPrecio();
		}
		return $precio;
	}
}
