<?php

session_start();

require_once("request.php");
require_once("validator.php");

$id = $_SESSION['uid'];
// $id = session_id();

if ($action == "create") {
    create_user($_POST);
} else if ($action == "retrieve") {
    retrieve_user($id);
} else if ($action == "update") {
    update_user($_POST, $id);
} else if ($action == "delete") {
    delete_user($id);
}



//ADD DATA VALIDATION to create function and update function
function create_user($data)
{
    global $db;
    if (!validate_age($data) && !validate_email($data) && !validate_first_name($data) && !validate_last_name($data) && !validate_username_creation($data)) {

        $sql = "INSERT INTO Users 
        (first_name, last_name, age, gender, email, username, pswd, street_address, city, postcode, county)
        VALUES(:first_name, :last_name, :age, :gender, :email, :username, :pswd, :street_address, :city, :postcode, :county);";

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

        echo ("Profile Created Successfully");
    } else {
        echo ("Please try again");
        exit();
    }
}

//Retrieve user function
function retrieve_user($id)
{
    global $db;
    $sql = "SELECT first_name, last_name, age, gender, email, street_address, city, postcode, county
    FROM Users WHERE id = :id;";

    $statement = $db->prepare($sql);
    $statement->bindValue(":id", $id);
    $statement->execute();

    if ($statement->rowCount() == 1){
        $details = $statement->fetch();
        echo "<table class='table table-dark'>";
        echo "<tr>";
        echo "<th>First Name:</th>";
        echo "<td>" . $details['first_name'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Last Name:</th>";
        echo "<td>" . $details['last_name'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Age:</th>";
        echo "<td>" . $details['age'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Gender:</th>";
        echo "<td>" . $details['gender'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Email:</th>";
        echo "<td>" . $details['email'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Street Address:</th>";
        echo "<td>" . $details['street_address'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>City:</th>";
        echo "<td>" . $details['city'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Postcode:</th>";
        echo "<td>" . $details['postcode'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>County:</th>";
        echo "<td>" . $details['county'] . "</td>";
        echo "</tr>";
        echo "</table>";
                 
    }
}

    // echo "<table class='table table-dark'>
    //         <tr>
    //         <th>First Name: </th>
    //         <th>Last Name: </th>
    //         <th> Age: </th>
    //         <th> Gender: </th>
    //         <th> Email: </th>
    //         <th>Street Address: </th>
    //         <th> City: </th>
    //         <th> Postcode: </th>
    //         <th> County: </th>
    //         </tr>";

    // if ($statement->rowCount() == 1) {
    //     $details = $statement->fetch();
    //     echo "<tr>";
    //     echo "<td>" . $details['first_name'] . "</td>";
    //     echo "<td>" . $details['last_name'] . "</td>";
    //     echo "<td>" . $details['age'] . "</td>";
    //     echo "<td>" . $details['gender'] . "</td>";
    //     echo "<td>" . $details['email'] . "</td>";
    //     echo "<td>" . $details['street_address'] . "</td>";
    //     echo "<td>" . $details['city'] . "</td>";
    //     echo "<td>" . $details['postcode'] . "</td>";
    //     echo "<td>" . $details['county'] . "</td>";
    //     echo "</tr>";
    // }
    // echo "</table>";
// }

//update user function
function update_user($data, $id)
{
    global $db;
    // validate_age($data);
    // validate_email($data);
    // validate_last_name($data);
    // validate_first_name($data);
    if (!validate_age($data) && !validate_email($data) && !validate_first_name($data) && !validate_last_name($data)) {

        $sql = "UPDATE Users SET first_name = :first_name, last_name = :last_name, age = :age, gender = :gender, email = :email, street_address = :street_address, city = :city, postcode = :postcode, county = :county
        WHERE id  = $id;";

        $statement = $db->prepare($sql);
        $statement->bindValue(":first_name", $data["first_name"]);
        $statement->bindValue(":last_name", $data["last_name"]);
        $statement->bindValue(":age", $data["age"]);
        $statement->bindValue(":gender", $data["gender"]);
        $statement->bindValue(":email", $data["email"]);
        $statement->bindValue(":street_address", $data["street_address"]);
        $statement->bindValue(":city", $data["city"]);
        $statement->bindValue(":postcode", $data["postcode"]);
        $statement->bindValue(":county", $data["county"]);

        $statement->execute();

        echo ("Profile Updated Successfully");
    } else {
        echo ("Please try again");
        exit();
    }
}



//delete user function

function delete_user($id)
{
    global $db;
    $sql = "DELETE FROM Users WHERE id = :id;";

    $statement = $db->prepare($sql);
    $statement->bindValue(":id", $id);

    $statement->execute();

    echo ("Profile Successfully Deleted");
    unset($_SESSION["uid"]);
    session_destroy();
}
