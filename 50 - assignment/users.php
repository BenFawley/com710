<?php


require_once("request.php");
//require_once("validator.php");


if ($action == "create") {
    create_user($_POST);
}

else if ($action == "retrieve"){
    retrieve_user($_GET);
}
// else if ($action == "update") {
//     update_user($id, $data);
// }




//ADD DATA VALIDATION to create function and update function
function create_user($data){
    global $db;
    $sql="INSERT INTO Users 
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

    echo("success");
}

//Retrieve user function
function retrieve_user($id){
    global $db;
    $sql ="SELECT first_name, last_name, age, gender, email, street_address, city, postcode, county
    FROM Users WHERE id = '$id'";

    $result=$db->query($sql);
    $sql->execute();

    echo"<table>
            <tr>
            <th>First Name: </th>
            <th>Last Name: </th>
            <th>Age: </th>
            <th>Gender: </th>
            <th>Email: </th>
            <th>Street Address: </th>
            <th>City: </th>
            <th>Postcode: </th>
            <th>County: </th>
            </tr>";
    
    if ($result -> rowCount() > 0){
        while($details = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $details['first_name'] . "</td>";
            echo "<td>" . $details['last_name'] . "</td>";
            echo "<td>" . $details['age'] . "</td>";
            echo "<td>" . $details['gender'] . "</td>";
            echo "<td>" . $details['email'] . "</td>";
            echo "<td>" . $details['street_address'] . "</td>";
            echo "<td>" . $details['city'] . "</td>";
            echo "<td>" . $details['postcode'] ."</td>" ;
            echo "<td>" . $details['county'] ."</td>" ;
            echo "</tr>";
        break;
        }
        echo "</table>";
    }
    else{
        echo "No User Found";
}

?>

// //update user function
// function update_User($id, $data){
//     $sql ="UPDATE Users 
//     SET first_name = ?, last_name = ?, age = ?, gender =?, email = ?, username = ?, pswd = ?, street_address = ?, city = ?, postcode = ?, county = ?
//     WHERE id  = '$id'";

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