<?php
require "../settings/connection.php";

function getAllChores(){
    global $con;
    $query="SELECT * FROM medicine_inventory";
    $result=mysqli_query($con,$query);
    $row=[];

    if($result){
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        echo "No chores found";
    }

    mysqli_free_result($result);
    mysqli_close($con);
    return $row;
}