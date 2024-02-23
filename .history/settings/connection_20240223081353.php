<?php
$server="localhost";
$user="root";
$passwd="";
$db="web_doctors";

$conn=mysqli_connect($server,$user,$passwd,$db) or die("Connection failed :: ".$conn->error);
?>