<?php
    include '../settings/connection.php';



    // decode JSON input
    $data = json_decode(file_get_contents('php://input'), true);
    $id=$_GET['id'];

    $query = "SELECT * FROM medicine_inventory WHERE medicine_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo json_encode($row);