<!----------------------
--------NO TOCAR--------
----------------------->
</head>
	<body>
		<div class="wrapper">
		<div id='navbar'>
			<a href="<?php echo $pos; ?>../principal/" id="logo"><img src="<?php echo $pos; ?>../img/logo-nav.png" alt="Chess Pizza" title="Ir al inicio" /></a>
			<div id="nav-icon">
				<span id="first"></span>
				<span id="second"></span>
				<span id="third"></span>	
				<span id="fourth"></span>			
			</div>
			<ul id="navbar-list">
				<?php
					foreach($navElements as $elem){
						echo "<li><a href='".$pos.$elem[1]."/' ".$elem[2].">".strtoupper($elem[0])."</a></li>";
					}
				?>
			</ul>
		</div>
		<div class="container">
