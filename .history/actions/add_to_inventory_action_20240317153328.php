<?php
    include '../settings/connection.php';


    // if (isset($_POST["addBtn"])) {
        $url="..\img\meds\product_0".
        $productName = "test";//$_POST['prodName'];
        $productQuantity =3;// $_POST['quantity'];
        $productPrice = 4;//$_POST['price']; 
        
       

        //SQL query to insert into the database
        $store = "INSERT INTO medicine_inventory (medicine_name, medicine_qty, medicine_price) 
                  VALUES ('$productName', '$productQuantity', '$productPrice')";
    
        // Execute the query
        if (mysqli_query($conn, $store)) {
            header("Location: ../admin/Inventory.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    // } 
    // else {
        // echo "Form submission error.";
    // }
?>
