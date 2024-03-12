<?php
require "../settings/connection.php";

function getPresc(){
    global $conn;
    $query="SELECT * FROM prescription LEFT JOIN people ON prescription.custom_id=people.p_id LEFT JOIN medicine_inventory ON prescription.medicine_id=medicine_inventory.medicine_id ";

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