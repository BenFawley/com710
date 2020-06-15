<?php

require_once("connect.php");
require_once("request.php");

// $firstName = ($_POST["first_name"]);
// $lastName = ($_POST["last_name"]);
// $age = ($_POST["age"]);
// $username = ($_POST["username"]);
// $email = ($_POST["email"]);

//validating first name
function validate_first_name($firstName){
    $firstName = ($_POST["first_name"]);
    if (empty($firstName)){
        echo ("Please enter a first name");
        return true;
} 
    elseif(!preg_match("/^[a-zA-Z]*$/", $firstName)){
        echo ("First name contained illegal characters. \n");
        return true;
    }
}

//validate last name
function validate_last_name($lastName){
    $lastName = ($_POST["last_name"]);
    if (empty($lastName)){
        echo("Please enter a last name. \n");
        return true;
} 
    elseif(!preg_match("/^[a-zA-Z]*$/", $lastName)){
        echo("Last name contained illegal characters. \n ");
        return true;
    }
}

//validate age
function validate_age($age){
    $age = ($_POST["age"]);
    if (empty($age)){
        echo("Please enter your age. \n");
        return true;
}
    else if(!filter_var($age, FILTER_VALIDATE_INT)){
        echo("Please enter a valid number for age. \n"); 
        return true;
}
    else if ($age < 0 || $age > 110){
        echo("Please enter a valid number for age. \n");
        return true;
    }
}
 
//validate username
function validate_username_creation($username){
    $username = ($_POST["username"]);
    global $db;
    $sql = "SELECT id FROM Users WHERE username = :username;";

    $result = $db->prepare($sql);
    $result->bindValue(":username", $username);

    $result->execute();

    if ($result->rowCount() == 1){
        echo("Username already exists.\n");
        return true;
    }

    if (empty($username)){
        echo("Please enter a username.\n");
        return true;      
    }
}
//validate email
function validate_email($email){
    $email = ($_POST["email"]);
    if (empty($email)){
        echo("Please enter an email address. \n");
        return true;
        
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo("Please enter a valid email address. \n");
        return true;
    }
}


?>
