<?php
require_once("connect.php");
require_once("request.php");

$username = $_POST["username"];
$password = $_POST["password"];


if ($action == "login"){
    login($username, $password);
}

function login($username, $password){
    global $db;
    if ($username != "" && $password!= "") {
        $sql = "SELECT id FROM Users WHERE username = :username and pswd = :pswd ;";

        $statement = $db->prepare($sql);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":pswd", $password);
        $statement->execute();
        
        // echo $statement->rowCount();
    
        if ($statement->rowCount() == 1){
            $record = $statement->fetch();
            session_start();
            $_SESSION["uid"]=$record["id"];
            // echo "success";
            }
        else {
            header("Location: index.php?error=incorrectdetails"); 
            echo "Incorrect Username or Password";
            }
    }
}

?>