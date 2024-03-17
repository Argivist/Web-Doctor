<?php
include '../settings/connection.php'; //include connection to the database
$data = json_decode(file_get_contents('php://input'), true); //get the data from the request
if ($data['action'] == "" || $data['pid'] == "") { //check if the action and prescription id are set
    echo json_encode(["status" => "error", "message" => "All fields are required"]); //return an error message if the action and prescription id are not set
    return;
}
//Approve Prescription
function approvePresc($pid)
{
    $query = "UPDATE `prescription` SET `approved` = 1 WHERE `prescript_id` = '$pid'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if ($result) {
        echo  json_encode(["status" => "Success", "message" => "Prescription Approved Successfully", "id" => $pid, "action" => "approve"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Prescription Approval Failed"]);
    }
}
//Reject Prescription
function rejectPresc($pid)
{
    $query = "UPDATE `prescription` SET `approved` = 2 WHERE `prescript_id` = '$pid'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if ($result) {
        echo json_encode(["status" => "Success", "message" => "Prescription Rejected Successfully", "id" => $pid, "action" => "reject"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Prescription Rejection Failed"]);
    }
}


//Determining which function is performed
if($data['action']==0){
    approvePresc($data['pid']);
}else{
    rejectPresc($data['pid']);
}