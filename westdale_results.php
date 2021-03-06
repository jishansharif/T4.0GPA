<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RateMyShawarma</title>         <!-- Browser tab title -->
    <link rel="stylesheet" href="results_style.css">
    <link rel="icon" href="media/browser_icon.jpg">       <!-- Browser tab icon -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <style>
        #map { height: 625px; }
    </style>
</head>

<body>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script type="text/javascript" src="map.js"></script>

<div class="grid-container">
  <div class="item1">
    <nav class="nav-bar">
        <?php include 'navbar.inc' ?>
    </nav>
  </div>

  <div class="item2">
    <fieldset>
      <b>Basilique</b>
      <br>
      <p>4.7 stars</p>
      <p>Address: 1554 Main St W, Hamilton, ON L8S 1E5</p>
      <br><a href='result_basilique.html'>Go to review page</a>
    </fieldset>

    <fieldset>
      <b>Lazeez Shawarma</b>
      <br>
      <p>2.3 stars</p>
      <p>Address: 1031 King St W, Hamilton, ON L8S 1L6</p>
      <br><a href='coming_soon.html'>Go to review page</a>
    </fieldset>

    <fieldset>
      <b>Tahini's</b>
      <p><br</p>
      <p>4.5 stars</p>
      <p>Address: 1065 King St W, Hamilton, ON L8S 1L8</p>
      <br><a href='coming_soon.html'>Go to review page</a>
    </fieldset>

  </div>

  <div class="item3">
    <div id="map"></div>
    <script>
      const mymap = L.map('map').setView([43.2610, -79.9075], 14);

      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiYWhtMTM4OCIsImEiOiJja3ZwNWJtbDAwcDI2Mm5xdmdjeWFnbnA5In0.U-FY7XjdPoITkJElfGJKgQ'
      }).addTo(mymap);
      var marker1 = L.marker([43.2610, -79.9075]).addTo(mymap);
      marker1.bindPopup("Basilique<br>4.7 stars<br>1554 Main St W, Hamilton, ON L8S 1E5<br><a href='result_basilique.html'>Go to review page</a>")
      var marker2 = L.marker([43.2615, -79.9063]).addTo(mymap);
      marker2.bindPopup("Lazeez Shawarma<br>2.3 stars<br>2.3 stars<br>1031 King St W, Hamilton, ON L8S 1L6<br><a href='coming_soon.html'>Go to review page</a>")
      var marker3 = L.marker([43.2577, -79.9257]).addTo(mymap);
      marker3.bindPopup("Tahini's<br>4.5 stars<br>1065 King St W, Hamilton, ON L8S 1L8<br><a href='coming_soon.html'>Go to review page</a>")


    </script>
  </div>


  <div class="item4">
      <footer>
          <?php include 'f_items.inc' ?>
      </footer>
  </div>

</div>

</body>

</html>