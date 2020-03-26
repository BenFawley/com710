<?php





$user_details = array(
    array("Ben", "Fawley", 23),
    array("Mark", "Fawley", 21)
);
    


function retrieve_user_name(){
    return "Ben";
}

function retrieve_user_address(){
    $address = array(
        "Street"=>"Royal_Cresent_Road",
        "City"=>"Southampton",
        "County"=>"Hampshire", 
        "Postal_code"=>"SO14 3ZP"
    );

    return $address;

function retrieve_user(){
    $address = array(
        "Street"=>"Royal_Cresent_Road",
        "City"=>"Southampton",
        "County"=>"Hampshire", 
        "Postal_code"=>"SO14 3ZP"
    );

    $user = array(
        "name" => "Ben Fawley",
        "address" => $address
    );

    return $user;
}


?>