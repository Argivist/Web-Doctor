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
$query="SELECT * FROM people WHERE p_id=?;";
$stmt=$conn->prepare($query);
$stmt->bind_param("i",$pid);
$stmt->execute();
if($stmt->get_result()->num_rows==0){
    echo json_encode(["status"=>"error","message"=>"Patient does not exist"]);
    return;
}else{
    $query="SELECT * FROM medicine_inventory WHERE medicine_id=?;";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("i",$Medicine_ID);
    $stmt->execute();
    if($stmt->get_result()->num_rows==0){
        echo json_encode(["status"=>"error","message"=>"Medicine does not exist"]);
        return;
    }else{
        $query="INSERT INTO prescription (custom_id,medicine_id,qty,approved,`desc`) VALUES (?,?,?,?,?);";
        $stmt=$conn->prepare($query);
        $approv=0;
        $stmt->bind_param("iiiis",$pid,$Medicine_ID,$quantity,$approv,$descr);
        if($stmt->execute()){
            echo json_encode(["status"=>"success"]);
        }else{
            echo json_encode(["status"=>$stmt->error]);
        } 
    }
}

  
?>