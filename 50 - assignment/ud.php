// //update user function
// function update_User($id, $data){
//     $sql ="UPDATE Users 
//     SET first_name = ?, last_name = ?, age = ?, gender =?, email = ?, username = ?, pswd = ?, street_address = ?, city = ?, postcode = ?, county = ?
//     WHERE id  = '$id'";

//     $statement = $db->prepare($sql);
//     $statement->bindValue(":first_name", $data["first_name"]);
//     $statement->bindValue(":last_name", $data["last_name"]);
//     $statement->bindValue(":age", $data["age"]);
//     $statement->bindValue(":gender", $data["gender"]);
//     $statement->bindValue(":email", $data["email"]);
//     $statement->bindValue(":username", $data["username"]);
//     $statement->bindValue(":pswd", $data["pswd"]);
//     $statement->bindValue(":street_address", $data["street_address"]);
//     $statement->bindValue(":city", $data["city"]);
//     $statement->bindValue(":postcode", $data["postcode"]);
//     $statement->bindValue(":county", $data["county"]);

//     $statement->execute();

//     echo("success");
// }
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

<table>
            <tr>
                <th>First Name: </th>
                <td></td>
            </tr>
            <tr>
                <th>Last Name: </th>
                <td></td>
            </tr>
            <tr>
                <th>Age: </th>
                <td></td>
            </tr>
            <tr>
                <th>Gender: </th>
                <td></td>
            </tr>
            <tr>
                <th>Email: </th>
                <td></td>
            </tr>
            <tr>
                <th>Street Address: </th>
                <td></td>
            </tr>
            <tr>
                <th>City: </th>
                <td></td>
            </tr>
            <tr>
                <th>Postcode: </th>
                <td></td>
            </tr>
            <tr>
                <th>County: </th>
                <td></td>
            </tr>
        </table>
       