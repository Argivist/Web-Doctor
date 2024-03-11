<?php

include "../settings/connection.php";

$query="SELECT DATETIME('week', date) AS week,SUM(total_cost) AS total_sales FROM purchase GROUP BY week ORDER BY week;";
$result=mysqli_query($conn,$query);
$row=[];
if($result){
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
}

//listing the weeks
$weeks="[";
foreach($row as $r){
    $weeks.="'".$r['week']."',";
}
$weeks.="]";

//listing the sales
$sales="[";
foreach($row as $r){
    $sales.=$r['total_sales'].",";
}
$sales.="]";