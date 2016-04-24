<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo">

<script>
        navigator.geolocation.getCurrentPosition(showPosition);
  
    document.write("Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude);	
}
</script>
</p>



</body>
</html>

