<?php

$server = "localhost";
$db = "database name";
$username = "Q14795574";
$password = "eeshuivi";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db, $Q14795574, $eeshuivi");
}
catch(PDOException $e){
    echo "Could not connect to the database.";
}




?> 