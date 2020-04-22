<?php

require_once("connect.php");

//ADD DATA VALIDATION to create function and update function
function create_User($data){
    $sql="INSERT INTO Users 
    (first_name, last_name, age, gender, email, username, pswd, street_address, city, country, registered)
    VALUES( ?,?,?,?,?,?,?,?,?,?)";

    //define variables and set to empty values
    $firstName = $lastName = $age = $email = $gender = "";
    $first_NameErr = $last_NameErr  = ageErr = $emailErr = $genderErr = "";

    //validating first name
    $firstName = ($_POST["first_name"]);
    if (empty($firstName)){
        $first_NameErr = "Please enter a first name";
    } 
    elseif(!preg_match("/^[a-zA-Z]*$/", $firstName)){
        $first_NameErr = "Please enter a valid name";
    else {$firstName = ($_POST["first_name"]);
        }
        
    }

    //validating last name
    $lastName = ($_POST["last_name"]);
    if (empty($lastName)){
        $last_NameErr = "Please enter a last name";
    } 
    elseif(!preg_match("/^[a-zA-Z]*$/", $lastName)){
        $last_NameErr = "Please enter a valid name";
    else {$lastName = ($_POST["last_name"]);
    }
        
    }

    //validating age

    $age = ($_POST["age"]);
    if (empty($age)){
        $ageErr = "Please enter your age";
    }
    if(filter_var($age, FILTER_VALIDATE_INT)){
        return true; 
        else $ageErr = "Please enter a valid number";
    }
    if 

    //validate user doesn't already exist

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


function retrieve_User($id){
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
function update_User($id, $data, $format=NULL){
    $sql ="UPDATE Users 
    SET first_name = ?, last_name = ?, age = ?, gender =?, email = ?, username = ?, pswd = ?, street_address = ?, city = ?, country = ?
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
    $statement->bindParam($data["country"]);

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