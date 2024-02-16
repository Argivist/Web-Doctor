<?php
$server="";
$user="root";
$passwd="root";
$db="web_docs";

$conn=mysqli_connect($server,$user,$passwd,$db) or die("Connection failed :: ".$conn->error);


