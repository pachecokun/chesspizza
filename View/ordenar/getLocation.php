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
  <div style="margin:0 auto; text-align:center">
    Obteniendo su ubicación...  <br>
<img style="align:center" width="100" src="../img/CookieLoader.gif"> 
<div>   
    <form id="formPedir" action="../" method="GET"> 
      <input type="hidden" id="txtLat" name="Lat"/>
      <input type="hidden" id="txtLon" name="Lon"/>    
    </form>
  </body>
</html>
