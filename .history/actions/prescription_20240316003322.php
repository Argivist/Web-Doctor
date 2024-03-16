<?php
include '../settings/connection.php';

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