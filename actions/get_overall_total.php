<?php
require "../settings/connection.php";
// session_start();
$query = "SELECT SUM(total_cost) as total FROM cart WHERE p_id=" . $_SESSION['id'];
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result); // Fetching a single row

// Accessing the 'total' column from the fetched row
echo $row['total'];
?>
