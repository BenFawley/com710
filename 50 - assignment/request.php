
<?php
// Import required libraries
require_once("connect.php");

// Decide what action to take
$method = $_SERVER['REQUEST_METHOD'];
$action = $_REQUEST['action'];
$db = connect();

if ($method == "GET") {
    $data = $_GET;
}
else {
    $data = $_POST;
}

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}


?>
