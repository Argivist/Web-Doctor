<?php
$server="localhost";
$user="root";
$passwd="cs341webtech";
$db="web_doctors";

$conn=mysqli_connect($server,$user,$passwd,$db) or die("Connection failed :: ".$conn->error);
?>