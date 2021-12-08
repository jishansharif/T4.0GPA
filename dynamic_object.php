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
        #map { height: 100%; }
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
        <fieldset style="display: block; overflow: auto;">
            <?php
            include "connect_db.inc";
            $id = $_GET['rest_id'];
            $statement = $pdo->query("SELECT * FROM `restaurants` WHERE `id` = $id");
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            echo $row['name']."<br>";
            echo $row['rating']." stars<br>";
            echo $row['address'];
            ?>
        </fieldset>
        <form action="review_form.php" method="get" >
            <input name="username" placeholder="Username"><br>
            <select name="stars" id="rating">       <!-- Drop down menu to search by rating (1 to 5 stars) -->
                <option value="none">Rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select><br>
            <input name="review" placeholder="Tell us about your experience with this restaurant"><br>
            <input type="hidden" name="rest_id" value="<?php echo $id;?>">
            <button><br>Submit Review<br></button>
        </form>
        <fieldset>
            <p>Reviews:<br></p>
            <?php
            $statement2 = $pdo->query("SELECT * FROM `reviews` WHERE `rest_id` = $id");
            $reviews = $statement2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($reviews as $review){
                echo "User: ".$review['username']."<br>";
                echo "Rating: ".$review['rating']." stars<br>";
                echo "\"".$review['review']."\""."<br><br>";
            }
            ?>
        </fieldset>

    </div>

    <div class="item3">
        <div id="map"></div>
        <script>
            var rest = <?php
            echo json_encode($row);
            ?>;
            var lat = parseFloat(rest.latitude)
            var long = parseFloat(rest.longitude)
            console.log(typeof lat);
            const mymap = L.map('map').setView([lat, long], 18);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiYWhtMTM4OCIsImEiOiJja3ZwNWJtbDAwcDI2Mm5xdmdjeWFnbnA5In0.U-FY7XjdPoITkJElfGJKgQ'
            }).addTo(mymap);
            var name = rest.name;
            var marker = L.marker([lat, long]).addTo(mymap);
            marker.bindPopup(name);
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