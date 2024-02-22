<?php
require "../settings/connection.php";

function getMed($findmed){
    global $conn;
    $query="SELECT * FROM medicine_inventory WHERE `medicine_name`==$findmed";

    $result=mysqli_query($conn,$query);
    $row=[];

    if($result){
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        echo "No meds found";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
    return $row;
    
}