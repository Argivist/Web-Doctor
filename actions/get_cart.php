<?php
require "../settings/connection.php";

function getCart(){
    global $conn;
    $query="SELECT * FROM cart LEFT JOIN people ON cart.p_id=people.p_id LEFT JOIN medicine_inventory ON cart.med_id=medicine_inventory.medicine_id WHERE cart.p_id=".$_SESSION['id'] ;

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