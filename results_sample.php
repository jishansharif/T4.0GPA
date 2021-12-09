<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'h_items.inc' ?>
</head>

<div class="header">
    <?php include 'navbar.inc' ?>
</div>

<body class="results-body">

<div class="grid-container-outer">
    <div class="grid-item">
        <div class="grid-container-inner">
            <div class="grid-item">
                <fieldset class="results-page-fieldset"><legend>Search for Restaurant</legend>
                    <form method="get">       <!-- Action not yet specified. "get" selected since this is a search box -->
                        <input type="text" name="Search bar" placeholder="Search for locations">        <!-- Search by name -->
                        <select name="stars">       <!-- Drop down menu to search by rating (1 to 5 stars) -->
                            <option value="none">Search by Rating</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                        <button type="submit" name="submit">Search!</button>
                    </form>
                </fieldset>
            </div>
            <div class="grid-item">
                <p>Restaurant Name: Tahini's</p>
                <img class="pie-score" src="media/4.7-rating.png">
                <p>4.7 stars</p>
                <p>Number of Reviews: 217</p>
                <p>Address: 1554 Main St W, Hamilton, ON L8S 1E5</p>
                <p><br></p>
                <p>Top Review: "Best AUTHENTIC shawarma in Hamilton!" (5 Stars)</p>
                <p><br></p>
                <p><b>Most popular item</b>: Chichen Shawarma Poutine</p>


                </ol>
                <a class="add-review-link" href="add_restaurant.php">Add your review</a>
            </div>
        </div>
    </div>
    <div class="grid-item">
        <div class="grid-map">
            <div class="grid-pictures">
                <img class="rest-image" src="media/tahinis.png">
                <img class="rest-image" src="media/tahinis-3.png">
                <img class="rest-image" src="media/tahinis-2.png">
            </div>
            <div class="grid-item">
                <img class="rest-image" src="media/tahinis-loc.png">
            </div>
        </div>
    </div>
</div>

<footer>
    <?php include 'f_items.inc' ?>
</footer>

</body>
</html>