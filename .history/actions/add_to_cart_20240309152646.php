<?php

include "../settings/connection.php";

$pid=$_POST['pid'];
$med_id=$_POST['mid'];
$qty=$_POST['qty'];
$price=$_POST['price'];

$query="INSERT INTO cart (patient_id,medicine_id,qty,total_cost) VALUES ('$pid','$med_id','$qty','$price*$qty')";
$result=mysqli_query($conn,$query);
if($result){
    echo "Added to cart";
}
else{
    echo "Failed to add to cart";
}

header("Location: ../shop.php");
?>
