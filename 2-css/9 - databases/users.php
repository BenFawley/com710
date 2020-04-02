<?php

require_once("connect.php");

function create_user($data){
    $sql ="
    INSERT INTO Users
    (first_name, last_name, age, email, street_address, city, country, registered)
    VALUES
    ($data[first_name], $data[last_name], $data[age], $data[email], $data[street_address], $data[city], $data[country], $data[registered]);
    ";
    $result = $conn->query($sql);
}

function retrieve_user($id){
    $sql ="SELECT first_name, last_name, age, email, street_address, city, country, registered
    FROM Users WHERE id = '$id'";

    $result = $conn->query($sql);

    if (!$result){
        return "no user found";
    }
    else{
        return $result
}


?>