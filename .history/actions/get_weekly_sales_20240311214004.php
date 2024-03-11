<?php

include "../settings/connection.php";

$query="SELECT DATE_TRUNC('week', date) AS week,SUM(sales) AS total_sales FROM sales_table GROUP BY week ORDER BY week;";
$result=mysqli_query($conn,$query);
$row=[];
if($result){
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
    echo "No sales found";
}