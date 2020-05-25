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

        $sql = "SELECT id FROM Users (username, pswd) VALUES (:username, :pswd);";

        $statement = $db->prepare($sql);
        $statement->bindValue(":username", $username["username"]);
        $statement->bindValue(":pswd", $password["password"]);
        $statement->execute();
        
    
        $result = $db->query($sql);
        if ($result->rowCount() == 1){
            $record = $result->fetch();
            session_start();
            $_SESSION["uid"]=$record["id"];
            header("Location: index.php");

            }
        else {
            header("Location: index.php?error=incorrectdetails"); 
            }
    }
}
