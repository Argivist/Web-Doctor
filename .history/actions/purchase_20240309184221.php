<?php
include '../settings/connection.php';
session_start();
// if($_POST['buy']){

    $query = "SELECT * FROM cart WHERE user_id = '".$_SESSION['id']."'";
    $result = mysqli_query($conn, $query);
    foreach($result as $row){
        $query = "INSERT INTO purchase (p_id, med_id, qty,total_cost, date) VALUES ('".$_SESSION['id']."', '".$row['p_id']."','".$row['med_id']."','".$row['qty']."', '".$row['total_cost']."', '".date('Y-m-d')."')";
        mysqli_query($conn, $query);
    }


