<?php
    include '../settings/connection.php';



    // decode JSON input
    $data = json_decode(file_get_contents('php://input'), true);
    if($data['prodName']==""||$data['quantity']==""||$data['price']==""||$data['desc']==""){
        echo json_encode(["status"=>"error","message"=>"All fields are required"]);
        return;
    }
    
     if (isset($data["addBtn"])) {
        $url="..\img\meds\productholder";
        $productName = $data['prodName'];
        $productQuantity =$data['quantity'];
        $productPrice = $data['price']; 
        $desc=$data['desc'];
       

        //SQL query to insert into the database
        $query = "INSERT INTO medicine_inventory (img_url, medicine_name, medicine_qty, medicine_price,`desc`) 
        VALUES (?, ?, ?, ?,?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssiis", $url, $productName, $productQuantity, $productPrice,$desc);                    
    
        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(["status"=>"success"]);
                    exit();
        } else {
            echo json_encode(["status"=>$stmt->error]);
        }
    } 
     else {
     echo "Form submission error.";
     }
?>
