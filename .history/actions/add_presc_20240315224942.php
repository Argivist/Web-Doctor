<?php

include "../settings/connection.php";
$Medicine_ID=$_POST['medid'];
$pid=$_POST['pid'];
$quantity=$_POST['quantity'];

$query="INSERT INTO prescription (med_id,patient_id,quantity) VALUES (?,?,?);";
$stmt=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$query)){
    echo "SQL Error";
}else{
    echo "success";
}
