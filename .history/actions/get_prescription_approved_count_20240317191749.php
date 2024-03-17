<?php
include '../settings/connection.php';


$count = "[";
$count_ = 0;

while ($count_ < 3) {
    $query = "SELECT approved,COUNT(*) AS count FROM prescription GROUP BY approved";
$result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['approved'] == $count_) {
            $count .= $row['count'];
        }
    }
    $count .= ",";
    $count_ = $count_ + 1;
}


$count .= "]";
echo $count;
