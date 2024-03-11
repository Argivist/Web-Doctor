<?php

include "../settings/connection.php";

$query="SELECT date AS week,SUM(total_cost) AS total_sales FROM purchase GROUP BY week ORDER BY week;";
$result=mysqli_query($conn,$query);
$row=[];
if($result){
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
}
//////sales stats
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

//////getting top selller stats
//getting the top sellers
$query="SELECT med_id AS mid,SUM(total_cost) AS total_sales FROM purchase GROUP BY mid ORDER BY mid; LIMIT 5";
$result=mysqli_query($conn,$query);
$row=[];
if($result){
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
}
//listing the meds
$meds="[";
foreach($row as $r){
    $meds.="'".$r['mid']."',";
}
$meds.="]";
//listing the sales
$med_sales="[";
foreach($row as $r){
    $med_sales.=$r['total_sales'].",";
}
$med_sales.="]";