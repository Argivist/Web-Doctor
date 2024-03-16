<?php

include "../settings/connection.php";
$data = json_decode(file_get_contents('php://input'), true);
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
if($stmt->affected_rows>0){
    echo json_encode(["status"=>200]);
}else{
    echo json_encode(["status"=>"failed"]);
}
?>