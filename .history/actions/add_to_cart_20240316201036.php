<?php

include "../settings/connection.php";

$pid = $_POST['pid'];
$med_id = $_POST['mid'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$total = $qty * $price;


//get prescription
$query="SELECT * FROM prescription WHERE custom_id = ? AND approved = 1 AND medicine_id = ? AND qty = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "iii", $pid, $med_id, $qty);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$presc = mysqli_fetch_assoc($result);




//adding
$query = "INSERT INTO cart (p_id, med_id, qty, total_cost) VALUES (?, ?, ?, ?)";
if($presc
{$stmt = mysqli_prepare($conn, $query);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "iiid", $pid, $med_id, $qty,$total);
    if (mysqli_stmt_execute($stmt)) {
        echo "Added to cart";
    } else {
        echo "Failed to add to cart";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Failed to prepare statement";
}}

mysqli_close($conn);

header("Location: ../view/shop.php");
exit;
?>