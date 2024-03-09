<?php
$pid=$_POST['pid'];
$med_id=$_POST['mid'];
$qty=$_POST['qty'];
$price=$_POST['price'];

$query="INSERT INTO cart (patient_id,medicine_id,qty,price) VALUES ('$pid','$med_id','$qty','$price')";
