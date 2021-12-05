<?php
$host = "localhost";
$dbname = "ratemyshawarma";
$user = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>