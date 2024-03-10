<?php
include '../settings/connection.php';
session_start();
if ($_POST['buy']) {
    
    $cart_items = [];

    $query = "SELECT * FROM cart WHERE p_id = '" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $query);
    foreach ($result as $row) {
        $query = "INSERT INTO purchase (p_id, med_id, qty,total_cost, date) VALUES ('" . $_SESSION['id'] . "','" . $row['med_id'] . "','" . $row['qty'] . "', '" . $row['total_cost'] . "', '" . date('Y-m-d') . "')";
        mysqli_query($conn, $query);
        $query = "UPDATE medicine_inventory SET medicine_qty = medicine_qty - '" . $row['qty'] . "' WHERE medicine_id = '" . $row['med_id'] . "'";
        mysqli_query($conn, $query);
        $query = "DELETE FROM cart WHERE p_id = '" . $_SESSION['id'] . "' AND med_id = '" . $row['med_id'] . "'";
        mysqli_query($conn, $query);

        $cart_items[] = $row;
    }
    //forwarding to checkout page
    $_SESSION['cart_items'] = $cart_items;
    header("Location: ../view/checkout.php");
}
