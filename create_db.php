<?php

$host = "localhost"; // Website IP address
$user = "root";
$password = "password";
$pdo = new PDO("mysql:host=$host", $user, $password); // Create connection

$pdo->query("CREATE DATABASE ratemyshawarma3");
$pdo->query("USE ratemyshawarma3");

$users = "CREATE TABLE `users` (
  `Username` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Member Since` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`Username`,`Password`)
)";

$restaurants = "CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `address` varchar(45) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `rating` decimal(5,1) NOT NULL,
  `website` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
)";

$reviews = "CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`id`)
)";

$pdo->query($users);
$pdo->query($restaurants);
$pdo->query($reviews);



