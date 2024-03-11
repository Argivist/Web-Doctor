<?php

include "../settings/connection.php";

$query="SELECT DATE_TRUNC('week', date) AS week,SUM(sales) AS total_sales FROM sales_table GROUP BY week ORDER BY week;";
$result=mysqli_query($conn,$query);
