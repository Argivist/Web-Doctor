<?php
include '../settings/connection.php';
session_start();
$del = $_GET['del'];

$query = "DELETE from cart where `p_id`=? AND med_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $_SESSION['id'],$del);
$stmt->execute();
// check if deleted
header("Location: ../view/cart.php");
