<?php
require "../settings/connection.php";
session_start();
$query = "SELECT SUM(total_cost) as total FROM cart WHERE p_id=" . $_SESSION['id'];
$result = mysqli_query($conn, $query);
$row = [];
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo $row['total'];