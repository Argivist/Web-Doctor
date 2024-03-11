<?php

include "../settings/connection.php";

$pid = $_POST['pid'];
$med_id = $_POST['mid'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$total = $qty * $price;

$query = "INSERT INTO cart (p_id, med_id, qty, total_cost) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

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
}

mysqli_close($conn);

header("Location: ../view/shop.php");
exit;
?>
