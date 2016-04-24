<!DOCTYPE html>
<html>
<body onLoad="getLocation()">

<p id="demo">

<script>
        function getLocation(){
        navigator.geolocation.getCurrentPosition(showPosition);
  
    document.write("Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude);	
}
</script>
</p>



</body>
</html>

