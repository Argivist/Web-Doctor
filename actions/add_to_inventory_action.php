<?php
    include '../settings/connection.php';

    if (isset($_POST["addBtn"])) {
        $productID = $_POST['prodID'];
        $productName = $_POST['prodName'];
        $productQuantity = $_POST['quantity'];
        
        $store = "INSERT INTO Inventory() VALUES ('$productID','$productName','$productQuantity')";
    
        if (mysqli_query($conn, $store)) {
            header("Location: ../admin/Inventory.php");
            exit();
        } else {
            echo "Error; " . mysqli_error($conn);
        }
    } 
    else {
        echo "Form submission error.";}
?>