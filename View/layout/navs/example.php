<?	
	/***** ejemplo nav *****/
	/*
		Define los elementos de la barra de navegación para el usuario. 
	*/
	
	/*
	Arreglo de los elementos de la barra de navegación
	Posicion:
		0 - Nombre de la sección (este se visualizará en la página).
		1 - Ubicación (directorio/archivo al que va a llevar).
		2 - Permite definir qué sección estará activa. (Consultar header.php).
		3 - (opcional) en caso de que se necesite un submenú, se agrega en este índice
	*/
	
	$submenu = array(
		"subSeccion1"=>array("Nombre de la subsección 1", "../seccion2/subseccion1", ""),
		"subSeccion2"=>array("Nombre de la subsección 2", "../seccion2/subseccion2", "") //ultimo elemento no lleva coma
	);
	
	$navElements = array(
				"seccion1" => array("Nombre de la Seccion 1", "../seccion1", ""),
				"seccion2" => array("Nombre de la Seccion 2", "../seccion2", ""),
				"seccion3" => array("Nombre de la Seccion 3", "../seccion3", "", $submenu), //La sección 3 tendrá un submenú
				"seccion4" => array("Mi Nombre de la Seccion 4", "../seccion4", "") //ultimo elemento no lleva coma
	);
	
?>