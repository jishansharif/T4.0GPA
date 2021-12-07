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
        <?php $host = "localhost"; // Website IP address
        $db = "ratemyshawarma";
        $user = "root";
        $password = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password); // Create connection
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>"; // Check for connection errors
            die(); // Terminates connection if there is an error
        }

        $name = $_GET["Search_bar"];
        if ($_GET["stars"] != "none") {
            $rating = $_GET["stars"];
        } else {
            $rating = 0;
        }

        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password); // Create connection
        $statement = $pdo->query("SELECT * FROM `restaurants` WHERE (`rating` >= $rating AND `name` LIKE '%$name%')");
        $rows = $statement->fetchall(PDO::FETCH_ASSOC);

        foreach ($rows as $row){
            echo $row['name'] . "<br>";
            echo $row['rating'] . " stars" . "<br>";
            echo "Website: " . "<a href=dynamic_object.php?rest_id={$row['id']}>Visit Website</a>" . "<br><br>";
        } ?>

    </div>

    <div class="item3">
        <div id="map"></div>
        <script>
            const mymap = L.map('map').setView([43.2610, -79.9075], 14);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiYWhtMTM4OCIsImEiOiJja3ZwNWJtbDAwcDI2Mm5xdmdjeWFnbnA5In0.U-FY7XjdPoITkJElfGJKgQ'
            }).addTo(mymap);

            var rows = <?php $statement = $pdo->query("SELECT * FROM `restaurants` WHERE (`rating` >= $rating AND `name` LIKE '%$name%')");
                $rows = $statement->fetchall(PDO::FETCH_ASSOC);
                echo json_encode($rows);
                ?>;

            for(i = 0; i < rows.length; i++){
                var marker = L.marker([rows[i]['latitude'], rows[i]['longitude']]).addTo(mymap);
                const popupContent = rows[i]['name'] + "<br>" + rows[i]['address'] + "<br>" + rows[i]['rating'] + ' stars' + "<br>";
                marker.bindPopup(popupContent);
            }
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