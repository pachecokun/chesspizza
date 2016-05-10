<?php
	$title = "";
	if(!isset($pos)){
		$pos = "";
	}
	if(isset($active)){
		$navElements[$active][2] = "class='active'";
		$title = $navElements[$active][0]." - ";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo $pos; ?>../css/master.css"/>