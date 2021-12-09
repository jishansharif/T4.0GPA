<?php
$name = $_GET['name'];
$address = $_GET['address'];
$rating = $_GET['rating'];
$lat = $_GET['latitude'];
$long = $_GET['longitude'];

include "connect_db.inc";
$sql = "INSERT INTO `restaurants` (`name`, `address`, `latitude`, `longitude`,`rating`) 
VALUES ('$name', '$address', '$lat', '$long', '$rating')";
$pdo->exec($sql);
echo "Success!"

?>

<a href="search.php">Go back to homepage<a>

