<?php
require "../settings/connection.php";


function getAllMeds(){
    $id=$_GET['id'];
    global $conn;
    $query="SELECT * FROM medicine_inventory where medicine_id=".$id;

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

echo json_encode(getAllMeds());