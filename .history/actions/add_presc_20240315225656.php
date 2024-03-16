<?php

include "../settings/connection.php";
$Medicine_ID=$_POST['medid'];
$pid=$_POST['pid'];
$quantity=$_POST['quantity'];

$query="INSERT INTO prescription (custom_id,medicine_id,qty,approved) VALUES (?,?,?,?);";
$stmt=$conn->prepare($query);
$approv=0;
$stmt->bind_param("iiii",$pid,$Medicine_ID,$quantity,$approv);
$stmt->execute();
if($stmt->affected_rows>0){
    echo "Prescription added successfully";
}else{
    echo "Prescription failed".$stmt->error;
}