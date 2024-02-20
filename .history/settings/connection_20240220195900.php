<?php
$server="localhost:3307";
$user="root";
$passwd="root";
$db="web_doc";

$conn=mysqli_connect($server,$user,$passwd,$db) or die("Connection failed :: ".$conn->error);
?>


