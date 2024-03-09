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

$query="UPDATE cart SET total_cost=(SELECT medicine_price FROM medicine_inventory WHERE medicine_id=?) * qty WHERE p_id=? AND med_id=?";    
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $med, $_SESSION['id'], $med);
$stmt->execute();


// "SELECT * FROM cart LEFT JOIN medicine_inventory ON cart.med_id=medicine_inventory.medicine_id WHERE cart.p_id=? AND cart.med_id=?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("ii", $_SESSION['id'],$med);
// $stmt->execute();
// $result = $stmt->get_result();

// // if($result){
// $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
// // }else{
// //     echo "No meds found";
// // }

// // mysqli_free_result($result);
// // mysqli_close($conn);

// $keys = array_keys($row);
// echo implode(", ", $keys);

// if($action==0){
//     $qty=$row['qty']+1;
// }else{
//     $qty=$row['qty']-1;
// }
// $total=$row['medicine_price']*$qty;

// $query="UPDATE cart SET qty=?,total_cost=? WHERE p_id=? AND med_id=?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("idii",$qty,$total, $_SESSION['id'],$med);
// $stmt->execute();

// // check if deleted
// // header("Location: ../view/cart.php");
