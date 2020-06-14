<?php 

require_once("connect.php");
require_once("request.php");


session_start();
unset($_SESSION["uid"]);
session_destroy();

echo "You are now logged out";



?>