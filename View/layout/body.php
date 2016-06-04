<!----------------------
--------NO TOCAR--------
----------------------->

<!-- 	
			body.php

Cierra la etiqueta </head> y abre <body>
Genera la barra de navegación y el layout general del sitio.
Todo el contenido de la página va después de incluir body.php.


-->

</head>
	<body>
		<div class="wrapper">
			<div id='navbar'>
				<a href="../principal/" id="logo"><img src="../img/logo-nav.png" alt="Chess Pizza" title="Ir al inicio" /></a>
            
				<!-- icono del menú de hamburguesa -->
				<div id="nav-icon">
					<span id="first"></span>
					<span id="second"></span>
					<span id="third"></span>	
					<span id="fourth"></span>			
				</div>
				<ul id='navbar-list'>
					<?php
						/* 	
							navElements: arreglo de los elementos de la barra de navegación,
								(consultar formato en layout/navs/example.php).
						*/
						if(isset($navElements)){
							foreach($navElements as $elem){
								if(isset($elem[3])){ //si existe un submenu para la sección
									echo "<li class='dropdown'><a href='".$elem[1]."/' ".$elem[2].">".strtoupper($elem[0])."</a>"
											."<ul>";
									foreach($elem[3] as $subMenu){
										echo "<li><a href='".$subMenu[1]."/' ".$subMenu[2].">".$subMenu[0]."</a>";
									}
									echo "</ul>"
										."</li>";
								}
								else
									echo "<li><a href='".$elem[1]."/' ".$elem[2].">".strtoupper($elem[0])."</a></li>";//strtoupper convierte la cadena a mayúsculas
							}
						}
						/*
							userSession:	variable auxiliar en caso de que se necesiten manejar sesiones
											(Consultar layout/header.php para más información).
						*/
						if(isset($userSession)){
							if(isset($_SESSION['empleado'])){
								echo "<li class='dropdown user'><a>".$_SESSION['empleado']['nombre']." ".$_SESSION['empleado']['apellido']."</a>"
										."	<ul>"
										."		<li><a href='../account'>Mi Cuenta</a></li>"
										."		<li><a href='../account/changePassword'>Cambiar contraseña</a></li>"
										."		<li><a href='../logout'>Cerrar sesión</a></li>"
										."	</ul>"
										."</li>";
							}
						}
					?>
				</ul>
			</div>
			<div class="container">
			<?php
				/*
					$_SESSION['message']:
							Variable auxiliar para mostrar un mensaje devuelto por el servidor.
							(Si no se pudo iniciar sesión, si el usuario no está autorizado para ingresar a una
							sección, si se registró un producto, etc.).
							
							Tipo: arreglo de dos entradas:
							0 - estilo de mensaje (Como en bootstrap: success, warning, danger e info).
							1 - Contenido del mensaje.
				*/
				if(isset($_SESSION['message'])){
					echo "<span class='text-".$_SESSION['message'][0]."'>".$_SESSION['message'][1]."</span>";
					unset($_SESSION['message']);
				}
				if(!empty($title)){
					echo "<h1>$title</h1>";
				}
			?>
