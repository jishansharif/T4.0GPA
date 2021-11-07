var form = document.getElementById('searchform');
// var location = document.getElementById("location");
var display = document.getElementById("display");

// form.addEventListener('submit', e => {
//     e.preventDefault();
//     getLocation();
// })

function getLocation(){
    
    console.log(location);
    console.log('---------------------');
    console.log(form);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        display.innerHTML = "Geolocation is not supported by this browser.";
      }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}

let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("display"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}
  

// function showPosition(position) {
//     var latlon = position.coords.latitude + "," + position.coords.longitude;

//     var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=400x300&sensor=false&key=YOUR_KEY";

//     document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
// }