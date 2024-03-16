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
        echo "Prescription Approved";
    } else {
        echo "Prescription Approval Failed";
    }
}