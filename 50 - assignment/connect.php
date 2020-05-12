<?php

function connect(){
    $db = "Q14795574";
    $username = "Q14795574";
    $password = "eeshuivi";
    $host = "localhost";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    return $conn;
}
catch(PDOException $e){
    echo "Could not connect to the database.";
    return null;
    }
}

?> 