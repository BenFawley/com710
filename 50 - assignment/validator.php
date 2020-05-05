<?php

function check_first_name($firstName){

}

//define variables and set to empty values
$firstName = $lastName = $age = $email = $gender = $username = $pswd = "";
$first_NameErr = $last_NameErr  = $ageErr = $emailErr = $genderErr = $usernameErr = $pswdErr = "";

//validating first name
$firstName = ($_POST["first_name"]);
if (empty($firstName)){
    $first_NameErr = "Please enter a first name";
} 
elseif(!preg_match("/^[a-zA-Z]*$/", $firstName)){
    $first_NameErr = "Please enter a valid name";
}
else {$firstName = ($_POST["first_name"]);
}
    

//validating last name
$lastName = ($_POST["last_name"]);
if (empty($lastName)){
    $last_NameErr = "Please enter a last name";
} 
elseif(!preg_match("/^[a-zA-Z]*$/", $lastName)){
    $last_NameErr = "Please enter a valid name";
}
else {$lastName = ($_POST["last_name"]);
}
    

//validating age - need to add acceptable add range

$age = ($_POST["age"]);
if (empty($age)){
    $ageErr = "Please enter your age";
}
else if(filter_var($age, FILTER_VALIDATE_INT)){
    return true; 
}
else{ $ageErr = "Please enter a valid number";
}


//validate user doesn't already exist
$username =($_POST["username"]);
if (empty($username)){
    $usernameErr = "Please enter a username";
}
if mysqli_num_Rows()

//validate email

$email =($_POST["email"]);
if (empty($email)){
    $emailErr = "Please enter an email address";
}
else if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    return true;
}
else{ echo("Please enter a valid email address");
}






?>