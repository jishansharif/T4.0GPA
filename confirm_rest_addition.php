<?php
include "connect_db.inc";
$name = $_GET['name'];
$address = $_GET['address'];
$rating = $_GET['rating'];
$lat = $_GET['latitude'];
$long = $_GET['longitude'];

$sql = "INSERT INTO `restaurants` (`name`, `address`, `rating`, `latitude`, `longitude`,`rating`) 
VALUES ('$name', '$address', '$rating', '$lat', '$long', 0)";
$pdo->exec($sql);
echo "Success!"

?>

<a href="search.php">Go back to homepage<a>

