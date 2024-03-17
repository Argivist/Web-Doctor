<?php
    include '../settings/connection.php';



    // decode JSON input
    //$data = json_decode(file_get_contents('php://input'), true);
    $id=$_GET['id'];

    $query = "SELECT * FROM medicine_inventory WHERE medicine_id = $id";
    $result = mysqli_query($conn, $query);
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo $row['medicine_name'];