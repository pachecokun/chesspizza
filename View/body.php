<!----------------------
--------NO TOCAR--------
----------------------->
</head>
	<body>
		<div id='navbar'>
			<a href="<?php echo $pos; ?>" id="logo-lineal">Chess Pizzas</a>
			<ul class="inline">
				<?php
					foreach($navElements as $elem){
						echo "<li><a href='".$pos.$elem[1]."' ".$elem[2].">".$elem[0]."</a></li>";
					}
				?>
			</ul>
		</div>
		<div class="container">