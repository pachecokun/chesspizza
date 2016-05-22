<html>
  <head>
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
  <body onLoad="getLocation()">
    Obteniendo su ubicación...    
    <form id="formPedir" action="../index.php" method="POST">
      <input type="hidden" id="txtLat" name="Lat"/>
      <input type="hidden" id="txtLon" name="Lon"/>    
    </form>
  </body>
</html>
