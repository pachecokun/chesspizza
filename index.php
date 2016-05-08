<?php
include_once('DAO/SucursalDAO.php');
include_once('Model/Sucursal.php');
?>
<html>
<head>
    <title>Chess pizzas</title>
    <script>
        function getLocation() {
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(locate);
            }else{
                document.write("Este navegador no soporta la geolocalización...");
            }
        }

        function locate(position) {
            document.getElementById("txtLat").value=position.coords.latitude;
            document.getElementById("txtLon").value=position.coords.longitude;
            document.forms["formPedir"].submit();
        }
    </script>
</head>
<body style="background-color: deeppink;color: aqua">
<h1>Chess pizza :D</h1>
<h2>Prueba :D</h2>
<form id="formPedir" action="getLocation.php" method="POST">
    <input type="hidden" id="txtLat" name="Lat"/>
    <input type="hidden" id="txtLon" name="Lon"/>
    <input type="button" value="Pedir Pizza" onclick="getLocation()"/>
</form>
</body>
</html>
