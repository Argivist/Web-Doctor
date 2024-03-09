<?php
include '../settings/connection.php';
session_start();
$med=$_GET['m_id'];
$action=$_GET['action'];
if($action=0){
    $query = "UPDATE cart SET qty=qty+1 WHERE p_id=? AND med_id=?";
}else{
    $query = "UPDATE cart SET qty=qty-1 WHERE p_id=? AND med_id=?";
}
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $_SESSION['id'], $med);
$stmt->execute();
echo $stmt->error;
$query="UPDATE cart SET total_cost=(SELECT medicine_price FROM medicine_inventory WHERE medicine_id=?) * qty WHERE p_id=? AND med_id=?";    
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $med, $_SESSION['id'], $med);
$stmt->execute();


// header("Location: ../view/cart.php");
