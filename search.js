var display = document.getElementById("map");

function getLocation(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        display.innerHTML = "Geolocation is not supported by this browser.";
      }
}

function showPosition(position) {
    display.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
