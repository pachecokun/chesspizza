<!----------------------
--------NO TOCAR--------
----------------------->
</head>
	<body>
		<div id='navbar'>
			<a href="<?php echo $pos; ?>../principal/" id="logo">Chess Pizzas</a>
			<span id="toggle">Navigation</span>
			<ul>
				<?php
					foreach($navElements as $elem){
						echo "<li><a href='".$pos.$elem[1]."/' ".$elem[2].">".strtoupper($elem[0])."</a></li>";
					}
				?>
			</ul>
		</div>
		<div class="container">
