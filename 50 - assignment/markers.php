<?php

require_once("connect.php");


function parseToXML ($htmlStr){
    $xmlStr=str_replace('<', '&lt;', $htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}
    
    global $db;

    $query = "SELECT * FROM Gyms";
    $result = $db->query($query);
    if (!$result){
        die("Database connection error");
    }

    header("Content-type: text/xml");

    //Start XML file, echo parent node
    echo "<?xml version='1.0' ?>";
    echo '<markers>';
    $ind=0;
    while ($result->rowCount() != 0){
        $details=$result->fetch();
        echo '<marker ';
        echo 'id="' . $details['Location_id'] . '" ';
        echo 'name="' . parseToXML($details['Name']) . '" ';
        echo 'address="' . parseToXML($details['Street_address']) . '" ';
        echo 'lat="' . $details['lat'] . '" ';
        echo 'lng="' . $details['lng'] . '" ';
        echo '/>';
        $ind = $ind + 1;
    }

    echo '</markers>';


?>