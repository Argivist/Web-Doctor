<?php
include "../settings/connection.php";

$id=$_POST["prodID"];
$name=$_POST["prodName"];
$qty=$_POST["quantity"];
$price=$_POST["price"];
$desc=$_POST["desc"];


$sql = "UPDATE medicine_inventory SET medicine_name='$name', medicine_qty='$qty', medicine_price='$price', `desc`='$desc' WHERE medicine_id='$id'";
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    header('Location: ../admin/inventory.php?update=success');
    exit();
} else {
header('Location: ../admin/inventory.php?sucess=failed');
    echo "Error updating record: " . mysqli_error($conn);
}
