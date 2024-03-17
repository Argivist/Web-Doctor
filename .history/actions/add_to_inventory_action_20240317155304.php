<?php
    include '../settings/connection.php';

    file_get_contents('php://input');

    // Decode JSON input
    $data = json_decode($json, true);
    // if (isset($_POST["addBtn"])) {
        $url="..\img\meds\productholder";
        $productName = $_POST['prodName'];
        $productQuantity =$_POST['quantity'];
        $productPrice = $_POST['price']; 
        $desc=$_POST['desc'];
       

        //SQL query to insert into the database
        $query = "INSERT INTO medicine_inventory (img_url, medicine_name, medicine_qty, medicine_price,`desc`) 
        VALUES (?, ?, ?, ?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssiis", $url, $productName, $productQuantity, $productPrice,$desc);                    
    
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
