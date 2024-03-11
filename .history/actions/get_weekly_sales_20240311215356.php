<?php

include "../settings/connection.php";

$query="SELECT date AS week,SUM(total_cost) AS total_sales FROM purchase GROUP BY week ORDER BY week;";
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

function topSellingDrug(){
    global $conn;
    $query="SELECT medicine_id, SUM(quantity) AS total_quantity FROM purchase GROUP BY medicine_id ORDER BY total_quantity DESC LIMIT 5;";
    $result=mysqli_query($conn,$query);
    $row=[];
    if($result){
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    return $row;
}