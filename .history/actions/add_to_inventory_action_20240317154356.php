<?php
    include '../settings/connection.php';


    // if (isset($_POST["addBtn"])) {
        $url="..\img\meds\productholder";
        $productName = "test";//$_POST['prodName'];
        $productQuantity =3;// $_POST['quantity'];
        $productPrice = 4;//$_POST['price']; 
        $desc="sadfds";
       

        //SQL query to insert into the database
        $query = "INSERT INTO medicine_inventory (img_url, medicine_name, medicine_qty, medicine_price,`desc`) 
        VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $url, $productName, $productQuantity, $productPrice,$desc);                    
    
        // Execute the query
        if ($stmt->execute()) {
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
