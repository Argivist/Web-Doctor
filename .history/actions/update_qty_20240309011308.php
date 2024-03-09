<?php
include '../settings/connection.php';
session_start();
$med=$_POST['m_id'];
$action=$_POST['action'];

$query = "SELECT qty,total_cost,medicine_inventory.medicine_price from cart LEFT JOIN medicine_inventory ON cart.med_id where cart.p_id=? AND cart.med_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $_SESSION['id'],$del);
$stmt->execute();
$result = $stmt->get_result();
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
if($action==0){
    $qty=$row['qty']+1;
}else{
    $qty=$row['qty']-1;
}
$total=

// check if deleted
header("Location: ../view/cart.php");
