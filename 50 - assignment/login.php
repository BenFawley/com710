<?php

require_once("request.php");

$username = $_POST["uName"];
$password = $_POST["pass"];

if ($action == "login"){
    login($username, $password);
}

function login($username, $password){
    if ($username != "" && $password!= "") {
        require_once("connect.php");

        $sql = "SELECT id FROM Users WHERE username='$username' AND pswd='$password'";
    
    $result =$conn->query($sql);
    if ($result->rowCount() == 1){
        $record = $result->fetch();
        session_start();
        $_SESSION["uid"]=$record["id"];

        echo("log in succesful");

    

    }
}
?>
