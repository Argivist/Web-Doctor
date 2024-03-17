<?php

include "../settings/connection.php";
$Medicine_ID=$_POST['medid'];
$pid=$_POST['pid'];
$quantity=$_POST['quantity'];

//validating input
$query="SELECT * FROM medicine_inventory WHERE medicine_id='$Medicine_ID';";
$result=mysqli_query($conn,$query);
//checking if at leart one results were returned
if(mysqli_num_rows($reult)>0){
    $query="SELECT * FROM people WHERE p_id='$pid';";
    $result=mysqli_query($conn,$query);
    //checking if at leart one results were returned
    if(mysqli_num_rows($reult)>0){
        $query="INSERT INTO prescription (p_id,med_id,quantity) VALUES (?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        $result=mysqli_stmt_prepare($stmt,$query);
        $result=mysqli_stmt_bind_param($stmt,"iii",$pid,$Medicine_ID,$quantity);
        $result=mysqli_stmt_execute($stmt);
        if($result){
            echo "Prescription added successfully";
        }        
    }else{
        echo "Invalid patient ID";
    }
}else{
    echo "Invalid medicine ID";
}