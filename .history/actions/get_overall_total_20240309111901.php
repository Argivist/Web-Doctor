<?php
require "../settings/connection.php";

$query = "SELECT SUM(total_cost) as total FROM cart WHERE p_id=" . $_SESSION['id'];
$result = mysqli_query($conn, $query);
$row = [];

echo $row['total'];