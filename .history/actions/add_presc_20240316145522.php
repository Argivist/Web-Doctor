<?php

include "../settings/connection.php";
$data = json_decode(file_get_contents('php://input'), true);
if($data['pat']==""||$data['med']==""||$data['qty']==""||$data['descr']==""){
echo json_encode(["status"=>"error","message"=>"All fields are required"]);
return;
}
$Medicine_ID=$data['med'];
$pid=$data['pat'];
$quantity=$data['qty'];
$descr=$data['descr'];

//checking if patient and medicine exist
$query="SELECT * FROM patient WHERE pid=?;";

$query="INSERT INTO prescription (custom_id,medicine_id,qty,approved,desc) VALUES (?,?,?,?,?);";
$stmt=$conn->prepare($query);
$approv=0;
$stmt->bind_param("iiiis",$pid,$Medicine_ID,$quantity,$approv,$descr);
if($stmt->execute()){
    echo json_encode(["status"=>"success"]);
}else{
    echo json_encode(["status"=>$stmt->error]);
}   
?>