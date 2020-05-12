<?php


require_once("request.php");
//require_once("validator.php");


if ($action == "create") {
    create_user($_POST);
}
// else if ($action == "update") {
//     update_user($id, $data);
// }




//ADD DATA VALIDATION to create function and update function
function create_user($data){
    global $db;
    $sql="INSERT INTO Users 
    (first_name, last_name, age, gender, email, username, pswd, street_address, city, postcode, county)
    VALUES(:first_name, :last_name, :age, :gender, :email, :username, :pswd, :street_address, :city, :postcode, :county)";
    
    $statement = $db->prepare($sql);
    $statement->bindValue(":first_name", $data["first_name"]);
    $statement->bindValue(":last_name", $data["last_name"]);
    $statement->bindValue(":age", $data["age"]);
    $statement->bindValue(":gender", $data["gender"]);
    $statement->bindValue(":email", $data["email"]);
    $statement->bindValue(":username", $data["username"]);
    $statement->bindValue(":pswd", $data["pswd"]);
    $statement->bindValue(":street_address", $data["street_address"]);
    $statement->bindValue(":city", $data["city"]);
    $statement->bindValue(":postcode", $data["postcode"]);
    $statement->bindValue(":county", $data["county"]);

    $statement->execute();

    echo("success");
}

// //Retrieve user function
// function retrieve_user($id){
//     $sql ="SELECT first_name, last_name, age, email, street_address, city, postcode, county, registered
//     FROM Users WHERE id = '$id'";

//     $result = $conn->query($sql);

//     if (!$result){
//         return "No User Found";
//     }
//     else{
//         return $result;
// }

// //update user function
// function update_User($id, $data){
//     $sql ="UPDATE Users 
//     SET first_name = ?, last_name = ?, age = ?, gender =?, email = ?, username = ?, pswd = ?, street_address = ?, city = ?, postcode = ?, county = ?
//     WHERE id  = '$id'";

//     $statement = $conn->prepare($sql);
//     $statement->bindParam($data["first_name"]);
//     $statement->bindParam($data["last_name"]);
//     $statement->bindParam($data["age"]);
//     $statement->bindParam($data["email"]);
//     $statement->bindParam($data["username"]);
//     $statement->bindParam($data["pswd"]);
//     $statement->bindParam($data["street_address"]);
//     $statement->bindParam($data["city"]);
//     $statement->bindParam($data["postcode"]);
//     $statement->bindParam($data["county"]);

//     $result=$conn->query($sql);
// }


// //need to CREATE A DELETE FUNCTION
// function delete_User($id){
//     $sql ="DROP USER from Users WHERE id = '$id'";

//     $result=$conn->query($sql);
// }
// //login function that checks there is no empty username and password

// function login($username, $password){
//     if (isset($username) && $username != "") &&
//         (isset($password) && $password != "")) {
        
//         $sql = "SELECT id FROM Users WHERE username='$username' AND pswd='$password'";
    
//     $result =$conn->query($sql);
//     if ($result->rowCOunt() ==1{
//         $record = $result->fetch();
//         session_start();
//         $_SESSION['uid']=$record[id];

//     }
//     }
   
//     }
// }


?>