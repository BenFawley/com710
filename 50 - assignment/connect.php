<?php

function connect(){
    $db = "epiz_27570765_GymDatabase";
    $username = "epiz_27570765";
    $password = "hBd40rrfwJ";
    $host = "sql105.epizy.com";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    return $conn;
}
catch(PDOException $e){
    echo "Could not connect to the database.";
    return null;
    }
}

// function connect(){
//     $db = "Q14795574";
//     $username = "Q14795574";
//     $password = "eeshuivi";
//     $host = "localhost";

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
//     return $conn;
// }
// catch(PDOException $e){
//     echo "Could not connect to the database.";
//     return null;
//     }
// }

?> 