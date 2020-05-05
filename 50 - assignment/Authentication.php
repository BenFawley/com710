<?php
require_once("connect.php");

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





?>