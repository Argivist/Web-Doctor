<?php
include '../settings/connection.php';

$query="SELECT approved,COUNT(*) AS count FROM prescription GROUP BY approved";
$result=mysqli_query($conn,$query);
$count="[";
$count=0;

while($count<3){
    while($row=mysqli_fetch_array($result)){
        if($row['approved']==$count){
            echo $row['approved']." ".$row['count'];
            $count.=$row['count'].",";
        }
            
        echo $row['approved']." ".$row['count'];
        $count.=$row['count'].",";
    }
}

               
$count.="]";
echo $count;