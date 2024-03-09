<?php
include '../settings/connection.php';
session_start();
$med=$_POST['m_id'];
$action=$_POST['action'];

$query = "SELECT qty,total_cost from cart where `p_id`=? AND med_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $_SESSION['id'],$del);
$stmt->execute();
$result = $stmt->get_result();

if

// check if deleted
header("Location: ../view/cart.php");
