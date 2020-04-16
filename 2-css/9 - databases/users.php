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

function create_user($data){
    $sql="INSERT INTO Users 
    (first_name, last_name, age, email, username, pswd, street_address, city, country, registered)
    VALUES( ?,?,?,?,?,?,?,?,?,?)";

    $statement = $conn->prepare($sql);
    $statement->bindParam($data["first_name"]);
    $statement->bindParam($data["last_name"]);
    $statement->bindParam($data["age"]);
    $statement->bindParam($data["email"]);
    $statement->bindParam($data["username"]);
    $statement->bindParam($data["pswd"]);
    $statement->bindParam($data["street_address"]);
    $statement->bindParam($data["city"]);
    $statement->bindParam($data["country"]);

    $result= $conn->query($sql);
}

function retrieve_user($id){
    $sql ="SELECT first_name, last_name, age, email, street_address, city, country, registered
    FROM Users WHERE id = '$id'";

    $result = $conn->query($sql);

    if (!$result){
        return "No User Found";
    }
    else{
        return $result;
}

//need to create update function - check whether this function is okay
function update_user($id, $data, $format=NULL){
    $sql ="UPDATE Users"
    $result=$conn->query($sql);
}



//need to CREATE A DELETE FUNCTION

//login function that checks there is no empty username and password

function login($username, $password){
    if (isset($username) && $username != "") &&
        (isset($password) && $password != "")) {
        
        $sql = "SELECT id FROM Users WHERE username='$username' AND pswd='$password'";
    
    $result =$conn->query($sql);
    if ($result->rowCOunt() ==1{
        $record = $result->fetch();
        session_start();
        $_SESSION['uid']=$record[id];

    }
    }
   
    }
}


?>