// var form = document.getElementById('searchform');
// var location = document.getElementById("location");
var display = document.getElementById("map");

// form.addEventListener('submit', e => {
//     e.preventDefault();
//     getLocation();
// })

function getLocation(){
    
    // console.log(location);
    // console.log('---------------------');
    // console.log(form);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        display.innerHTML = "Geolocation is not supported by this browser.";
      }
}

function showPosition(position) {
    // x.innerHTML = "Latitude: " + position.coords.latitude + 
    // "<br>Longitude: " + position.coords.longitude;
    const mymap = L.map('map').setView([position.coords.latitude, position.coords.longitude], 10);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiYWhtMTM4OCIsImEiOiJja3ZwNWJtbDAwcDI2Mm5xdmdjeWFnbnA5In0.U-FY7XjdPoITkJElfGJKgQ'
    }).addTo(mymap);
}
