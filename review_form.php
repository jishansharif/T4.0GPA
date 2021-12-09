<?php

$username = $_GET['username'];
$rest_id = $_GET['rest_id'];
$rating = $_GET['stars'];
$review = $_GET['review'];

include "connect_db.inc";
$sql = "INSERT INTO `reviews` (`username`, `rest_id`, `rating`, `review`) 
VALUES ('$username', '$rest_id', '$rating', '$review')";
$pdo->exec($sql);
echo "Success!"
?>

<a href="search.php">Go back to homepage<a>

