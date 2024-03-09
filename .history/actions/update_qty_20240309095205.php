<?php
include '../settings/connection.php';
session_start();
$med=$_GET['m_id'];
$action=$_GET['action'];

$query = "SELECT * FROM cart LEFT JOIN medicine_inventory ON cart.med_id = medicine_inventory.medicine_id WHERE cart.p_id=? AND cart.med_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $_SESSION['id'],$del);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows>0){
    $row=$result->fetch_assoc();
}

if($action==0){
    $qty=$row['qty']+1;
}else{
    $qty=$row['qty']-1;
}
$total=$row['medicine_price']*$qty;

$query="UPDATE cart SET qty=?,total_cost=? WHERE p_id=? AND med_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("idii",$qty,$total, $_SESSION['id'],$med);
$stmt->execute();

// check if deleted
// header("Location: ../view/cart.php");
