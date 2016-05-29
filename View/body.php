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
				<a href="<?php echo $pos; ?>../principal/" id="logo"><img src="<?php echo $pos; ?>../img/logo-nav.png" alt="Chess Pizza" title="Ir al inicio" /></a>
            
            <!-- incono del menú de hamburguesa -->
				<div id="nav-icon">
					<span id="first"></span>
					<span id="second"></span>
					<span id="third"></span>	
					<span id="fourth"></span>			
				</div>
				<ul id='navbar-list'>
					<?php
						foreach($navElements as $elem){
							echo "<li><a href='".$pos.$elem[1]."/' ".$elem[2].">".strtoupper($elem[0])."</a></li>";//strtoupper convierte la cadena a mayúsculas
						}
						/*
						if(isset($_GET['session'])){
							echo "<li class='dropdown user'><a href='ordenar'>DEMIS GÓMEZ</a>"
									."	<ul>"
									."		<li><a>Mi Cuenta</a></li>"
									."		<li><a>Cerrar sesión</a></li>"
									."	</ul>"
									."</li>";
						}
						else{
							echo  "<li><a href='".$pos."login/'>INICIAR SESION</a></li>";
						}*/
					?>
				</ul>
			</div>
			<div class="container">
