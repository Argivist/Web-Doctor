<?php
include '../settings/connection.php';

$query="SELECT approved,COUNT(*) AS count FROM prescription GROUP BY approved";
$result=mysqli_query($conn,$query);
$count="[";
while($row=mysqli_fetch_array($result)){
    echo $row['count'];
    $count.=$row['count'].",";
}                       
$count.="]";
echo $count;