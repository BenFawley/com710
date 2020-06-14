<?php

require_once("connect.php");
require_once("request.php");

//validating first name
function validate_first_name($firstName){
    $firstName = ($_POST["first_name"]);
    if (empty($firstName)){
        echo ("Please enter a first name");
} 
    elseif(!preg_match("/^[a-zA-Z]*$/", $firstName)){
        echo ("Please enter a valid name");
    }
}

//validate last name
function validate_last_name($lastName){
    $lastName = ($_POST["last_name"]);
    if (empty($lastName)){
        echo("Please enter a last name");
} 
    elseif(!preg_match("/^[a-zA-Z]*$/", $lastName)){
        echo("Please enter a valid name");
    }
}

//validate age
function validate_age($age){
    $age = ($_POST["age"]);
    if (empty($age)){
        echo("Please enter your age");
}
    else if(!filter_var($age, FILTER_VALIDATE_INT)){
        echo("Please enter a valid number"); 
}
    else if ($age < 0 || $age > 110){
        echo("Please enter a valid number");
    }
}
 
//validate username
function validate_username_creation($username){
    global $db;
    $username = ($_POST["username"]);
    $sql = "SELECT id FROM Users WHERE username = $username;";

    $result = $db->query($sql);
    if ($result -> rowCount() == 1){
        echo("Username already exists");
    }

    if (empty($username)){
        echo("Please enter a username");
    }
}
//validate email
function validate_email($email){
    $email = ($_POST["email"]);
    if (empty($email)){
        echo("Please enter an email address");
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo("Please enter a valid email address");
    }
}


?>
