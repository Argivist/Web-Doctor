<?php
    include '../settings/connection.php';



    // decode JSON input
    $data = json_decode(file_get_contents('php://input'), true);
    if($data['prodName']==""||$data['quantity']==""||$data['price']==""||$data['desc']==""){
        echo json_encode(["status"=>"error","message"=>"All fields are required"]);
        return;
    }
    
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
