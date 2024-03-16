<?php
include '../settings/connection.php';
$data = json_decode(file_get_contents('php://input'), true);
if($data['pat']==""||$data['med']==""||$data['qty']==""){
echo json_encode(["status"=>"error","message"=>"All fields are required"]);
return;
}
function approvePresc($pid)
{
    $query = "UPDATE `prescription` SET `status` = 'Approved' WHERE `prescript_id` = '$pid'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if ($result) {
        echo  json_encode(["status"=>"Approved Successfully","message"=>"Prescription Approved Successfully","id"=>$pid,"action"=>"approve"]);
    } else {
        echo json_encode(["status"=>"error","message"=>"Prescription Approval Failed"]);
    }
}

function rejectPresc($pid)
{
    $query = "UPDATE `prescription` SET `status` = 'Rejected' WHERE `prescript_id` = '$pid'";
    $result = mysqli_query($GLOBALS['conn'], $query);
    if ($result) {
        echo json_encode(["status"=>"Rejected Successfully","message"=>"Prescription Rejected Successfully","id"=>$pid,"action"=>"reject"]);
    } else {
        echo json_encode(["status"=>"error","message"=>"Prescription Rejection Failed"])
    }
}