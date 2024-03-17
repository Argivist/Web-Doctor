<?php

include "../settings/connection.php";
if(!isset($_POST['med'])||!isset($_POST['pat'])||!isset($_POST['qty'])){
    die("Please fill all fields");
}
$Medicine_ID=$_POST['med'];
$pid=$_POST['pat'];
$quantity=$_POST['qty'];

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