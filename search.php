<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'h_items.inc' ?>
</head>

<body>
<nav class="nav-bar">
    <?php include 'navbar.inc' ?>
</nav>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script type="text/javascript" src="map.js"></script>
<script type="text/javascript" src="search.js"></script>

<div id="contents">
    <fieldset class="search"><legend>Find Restaurants</legend>
        <form method="get" id="searchform" action="dynamic_results.php">       <!-- Action not yet specified. "get" selected since this is a search box -->
            <input type="text" name="Search_bar" placeholder="Search by Resturant Name" id="location">        <!-- Search by name -->
            <select name="stars" id="rating">       <!-- Drop down menu to search by rating (1 to 5 stars) -->
                <option value="none">Search by Rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            <button>Search</button>
        </form>
    </fieldset>
</div>


<script>
    var display = document.getElementById("display");
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
</script>
<div class="site-footer">
    <footer>
        <?php include 'f_items.inc'; ?>
    </footer>
</div>

</body>
</html>