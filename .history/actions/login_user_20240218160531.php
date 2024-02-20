<?php
require "../settings/connection.php";

$user=$_POST['uname'];
$pass=$_POST['passwd'];

 $query="SELECT * FROM users WHERE username='$user' AND password='$pass'";