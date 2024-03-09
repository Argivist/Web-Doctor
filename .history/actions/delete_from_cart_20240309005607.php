<?php
include '../settings/connection.php';
session_start();
$del=$_GET['del'];

$query="DELETE * from cart where `p_id`=".$_SESSION['id']." AND med_id=".$del;
