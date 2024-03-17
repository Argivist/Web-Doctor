<?php

include "../settings/connection.php";
$data = json_decode(file_get_contents('php://input'), true);
if(!isset($data['med'])||!isset($data['pat'])||!isset($data['qty'])){
    echo json_encode(["status"=>"error","message"=>"All fields are required"]);
    return;
}
$Medicine_ID=$data['med'];

$pid=$data['pat'];
$quantity=$data['qty'];

$query="INSERT INTO prescription (custom_id,medicine_id,qty,approved) VALUES (?,?,?,?);";
$stmt=$conn->prepare($query);
$approv=0;
$stmt->bind_param("iiii",$pid,$Medicine_ID,$quantity,$approv);
if($stmt->execute()){
    echo json_encode(["status"=>"success"]);
}else{
    echo json_encode(["status"=>$stmt->error]);
}   
?>