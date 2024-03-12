<?php
include '../settings/connection.php';

$query="SELECT approved,COUNT(*) AS count FROM prescription GROUP BY approved";
$result=mysqli_query($conn,$query);
$key=array();
$value=array();
while($row=mysqli_fetch_array($result)){
    array_push($key,$row['approved']);
    array_push($value,$row['count']);
}


