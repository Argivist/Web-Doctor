<?php
require "../settings/connection.php";

function getCart(){
    global $conn;
    $query="SELECT * FROM `cart` LEFT JOIN `people` ON `p_id` LEFT JOIN `medicine_inventory` ON `med_id` WHERE `p_id`=".$_SESSION['id'] ;

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