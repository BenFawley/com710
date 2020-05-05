<?php

require_once("connect.php");
require_once("validator.php");



//ADD DATA VALIDATION to create function and update function
function create_User($data){
    $sql="INSERT INTO Users 
    (first_name, last_name, age, gender, email, username, pswd, street_address, city, postcode, county, registered)
    VALUES( ?,?,?,?,?,?,?,?,?,?,?)";

    $statement = $conn->prepare($sql);
    $statement->bindParam($data["first_name"]);
    $statement->bindParam($data["last_name"]);
    $statement->bindParam($data["age"]);
    $statement->bindParam($data["email"]);
    $statement->bindParam($data["username"]);
    $statement->bindParam($data["pswd"]);
    $statement->bindParam($data["street_address"]);
    $statement->bindParam($data["city"]);
    $statement->bindParam($data["postcode"]);
    $statement->bindParam($data["county"]);

    $result= $conn->query($sql);
}

//Retrieve user function
function retrieve_User($id){
    $sql ="SELECT first_name, last_name, age, email, street_address, city, postcode, county, registered
    FROM Users WHERE id = '$id'";

    $result = $conn->query($sql);

    if (!$result){
        return "No User Found";
    }
    else{
        return $result;
}

//update user function
function update_User($id, $data, $format=NULL){
    $sql ="UPDATE Users 
    SET first_name = ?, last_name = ?, age = ?, gender =?, email = ?, username = ?, pswd = ?, street_address = ?, city = ?, postcode = ?, county = ?
    WHERE id  = '$id'";

    $statement = $conn->prepare($sql);
    $statement->bindParam($data["first_name"]);
    $statement->bindParam($data["last_name"]);
    $statement->bindParam($data["age"]);
    $statement->bindParam($data["email"]);
    $statement->bindParam($data["username"]);
    $statement->bindParam($data["pswd"]);
    $statement->bindParam($data["street_address"]);
    $statement->bindParam($data["city"]);
    $statement->bindParam($data["postcode"]);
    $statement->bindParam($data["county"]);

    $result=$conn->query($sql);
}


//need to CREATE A DELETE FUNCTION
function delete_User($id){
    $sql ="DROP USER from Users WHERE id = '$id'";

    $result=$conn->query($sql);
}
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