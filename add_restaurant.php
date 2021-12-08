<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RateMyShawarma</title>         <!-- Browser tab title -->
    <link rel="icon" href="media/browser_icon.jpg">       <!-- Browser tab icon -->
    <link rel="stylesheet" type="text/css" href="style2.css">        <!-- Importing CSS file -->
</head>

<body>
    <nav class="nav-bar">
        <?php include 'navbar.inc' ?>
    </nav>

<div class="container-submission">
    <div class="header">
        <h2>Add Restaurant</h2>
    </div>
    <form class="form" id="form" action="confirm_rest_addition.php" method="get">
        <!-- Most important purpose of our app, to submit a review for a resturant-->
        <div class="submit-form">
            <label for="restaurant-name">Restaurant Name</label>
            <input type="text" placeholder="Restaurant Name" id="restaurant-name" name="name" required>
            <!-- Minimal restrictions since many restaurant names include special characters -->
        </div>
        <div class="submit-form">
            <label for="address">Restaurant Address</label>
            <input type="text" placeholder="Restaurant Address" id="address" name="address" required>  <!-- Ensures input is a number (0-5) -->
        </div>
        <div class="submit-form">
            <label for="rating">Rating</label>
            <input type="number" placeholder="Rating (Out of 5)" id="rating"
                   min="0" max="5" required>  <!-- Ensures input is a number (0-5) -->
        </div>
        <div class="submit-form">
            <label for="latitude">Latitude</label>
            <input type="number" placeholder="Latitude" id="latitude" name="latitude"
                   step="0.0001" min="-90" max="90" required>  <!-- Ensures valid latitude value
                    is entered; value set to 4 decimal places since that is how Google displays
                    coordinates-->
            <i onclick="getLatitude()">Click to retreieve latitude</i>
        </div>
        <div class="submit-form">
            <label for="longitude">Longitude</label>
            <input type="number" placeholder="Longitude" id="longitude" name="longitude"
                   step="0.0001" min="-180" max="180" required> <!-- Ensures valid longitude value
                    is entered; value set to 4 decimal places since that is how Google displays
                    coordinates-->
            <i onclick="getLongitude()">Click to retreieve longitude</i>
        </div>
        <button class="button" type="submit">Add Restaurant</button>
    </form>
</div>
<script>

var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");

function getLatitude() {
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLatitudePosition);
    } else { 
        latitude.value = "Geolocation is not supported by this browser.";
    }
}

function getLongitude(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLongitudePosition);
    } else { 
        latitude.value = "Geolocation is not supported by this browser.";
    }
}

function showLatitudePosition(position) {
  latitude.value = position.coords.latitude.toFixed(4)
}

function showLongitudePosition(position) {
  longitude.value = position.coords.longitude.toFixed(4)
}

</script>
    <footer>
        <?php include 'f_items.inc' ?>
    </footer>

</body>
</html>